<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\UserCreationException;
use App\Http\Requests\Auth\ValidateUserCreationRequest;
use App\Interfaces\Auth\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class AuthController
{
    private AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $service)
    {
        $this->setAuthService($service);
    }

    public function register(ValidateUserCreationRequest $request) : JsonResponse
    {
        try {

           $return = $this->getAuthService()->validateNewUser($request->name,$request->email,$request->password);

            return response()->json([
                'message' => $return->message,
                'user'    => $return->user,
                'token'   => $return->token
            ],201);

        }catch (UserCreationException $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ],500);
        }
    }

    public function getAuthService(): AuthServiceInterface
    {
        return $this->authService;
    }

    public function setAuthService(AuthServiceInterface $authService): void
    {
        $this->authService = $authService;
    }
}
