<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;

class UserCreationException extends \Exception
{

    public function __construct(string $message = "Failed to create user", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message,$code,$previous);
    }

    public function render() : JsonResponse
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], 500);
    }
}
