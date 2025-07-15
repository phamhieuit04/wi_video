<?php

namespace App\Factory\Auth;

interface AuthInterface
{
    public function getOAuthUrl();
    public function getAccessToken(string $code);

    public function getUserInfo(string $accessToken);
}