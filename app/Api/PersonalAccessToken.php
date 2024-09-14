<?php

namespace App\Api;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    public static function boot() : void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }

}
