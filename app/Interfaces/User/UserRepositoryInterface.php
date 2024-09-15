<?php

namespace App\Interfaces\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function register(string $name, string $email, string $password) : User;
}
