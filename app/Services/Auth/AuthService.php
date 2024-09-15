<?php

namespace App\Services\Auth;

use App\Interfaces\Auth\AuthServiceInterface;
use App\Interfaces\User\UserRepositoryInterface;

class AuthService implements AuthServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->setUserRepository($userRepository);
    }


    public function validateNewUser(string $name, string $email, string $password): object
    {
        $newUser = $this->getUserRepository()->register($name, $email, $password);

        $token = $newUser->createToken('API Token')->plainTextToken;

        return (object)['message'=> 'User registered successfully','user' =>$newUser,'token'=> $token];
    }

    public function getUserRepository(): UserRepositoryInterface
    {
        return $this->userRepository;
    }

    public function setUserRepository(UserRepositoryInterface $userRepository): void
    {
        $this->userRepository = $userRepository;
    }
}
