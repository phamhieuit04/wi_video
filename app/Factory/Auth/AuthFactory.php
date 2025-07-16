<?php

namespace App\Factory\Auth;

use App\Services\Facebook\FacebookAuthService;
use App\Services\Google\GoogleAuthService;


class AuthFactory
{
    public static function make(string $provider)
    {
        return match ($provider) {
            'google' => new GoogleAuthService(),
            'facebook' => new FacebookAuthService(),
            default => throw new \Exception('Auth Provider is not supported!'),
        };
    }
}