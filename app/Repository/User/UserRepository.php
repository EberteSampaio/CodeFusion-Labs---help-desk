<?php

namespace App\Repository\User;

use App\Exceptions\UserCreationException;
use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function register(string $name, string $email, string $password): User
    {
        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return ($user->save()) ? $user : throw new UserCreationException("Failed to save new user to the database.");
    }
}
