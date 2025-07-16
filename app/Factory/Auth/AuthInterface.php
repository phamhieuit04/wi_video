<?php

namespace App\Factory\Auth;

interface AuthInterface
{
    /**
     * Generate the OAuth authorization URL for the client to authenticate.
     *
     * @return string URL auth
     */
    public function getOAuthUrl();

    /**
     * Exchange the authorization code for an access token from the OAuth provider.
     *
     * @param string $code The authorization code received from the OAuth provider
     * @return string Access token
     */
    public function getAccessToken(string $code);

    /**
     * Retrieve user information using the provided access token.
     *
     * @param string $accessToken The access token obtained from the OAuth provider
     * @return array User information
     */
    public function getUserInfo(string $accessToken);
}