<?php

namespace App\Factory\Auth;

use Illuminate\Support\Facades\Http;

class FacebookAuth implements AuthInterface
{
    const AUTH_URL = 'https://www.facebook.com/v18.0/dialog/oauth';
    const TOKEN_URL = 'https://graph.facebook.com/v18.0/oauth/access_token';
    const USER_INFO_URL = 'https://graph.facebook.com/me';

    /**
     * Factory method redirect to Auth URL
     *
     * @return string URL auth
     */
    public function getOAuthUrl()
    {
        return self::AUTH_URL .
            '?client_id=' . env('FACEBOOK_CLIENT_ID') .
            '&redirect_uri=' . env('FACEBOOK_REDIRECT_URI') .
            '&response_type=code' .
            '&scope=email public_profile';
    }

    /**
     * Factory method used to get authentication token in Facebook.
     *
     * @param string $code is obtained by parsing the parameters returned from Facebook Service.
     * @return string response access_token
     */
    public function getAccessToken(string $code)
    {
        $response = Http::asForm()->post(self::TOKEN_URL, [
            'client_id' => env('FACEBOOK_CLIENT_ID'),
            'redirect_uri' => env('FACEBOOK_REDIRECT_URI'),
            'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'code' => $code,
        ]);
        return $response['access_token'];
    }

    /**
     * Factory method gets user information from Facebook Service's GraphQL.
     *
     * @param string $accessToken Get from the function above.
     * @return array array user infor
     */
    public function getUserInfo(string $accessToken)
    {
        $response = Http::get(self::USER_INFO_URL, [
            'fields' => 'id,name,email,picture',
            'access_token' => $accessToken,
        ])->json();
        return [
            'id' => $response['id'],
            'email' => !blank($response['email']) ? $response['email'] : $response['id'] . '@facebook.com',
            'name' => $response['name'],
            'picture' => $response['picture']['data']['url']
        ];
    }
}
