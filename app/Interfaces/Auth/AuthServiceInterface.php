<?php

namespace App\Interfaces\Auth;


interface AuthServiceInterface
{
    public function validateNewUser(string $name, string $email, string $password) : object;
}
