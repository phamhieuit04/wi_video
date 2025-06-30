<?php

namespace App\Http\Controllers;

use App\Factory\Auth\GoogleAuth;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepo)
    {
    }

    public function auth()
    {
        return view('auth');
    }

    public function googleAuth(Request $request)
    {
        $params = $request->all();
        $googleAuth = new GoogleAuth();
        try {
            // Get access token from google
            $accessToken = $googleAuth->getAccessToken($params['code']);
            $userInfo = $googleAuth->getUserInfo($accessToken);
            // Check user info in DB
            $user = $this->userRepo->findByEmail($userInfo['email']);
            // User has ready, create session and go to home page.
            if (is_null($user)) {
                // Add new user
                $newUserInfo = [
                    'name' => $userInfo['name'],
                    'email' => $userInfo['email'],
                    'avatar' => $userInfo['picture'],
                    'google_id' => '',
                    'facebook_id' => ''
                ];
                $user = $this->userRepo->create($newUserInfo);
            }
            Auth::login($user);
            return redirect('/home');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/auth');
        }
    }
}
