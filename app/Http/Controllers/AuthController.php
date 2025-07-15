<?php

namespace App\Http\Controllers;

use App\Factory\Auth\AuthFactory;
use App\Factory\Auth\FacebookAuth;
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

    public function redirect(Request $request, string $provider)
    {
        $authFactory = AuthFactory::make($provider);
        return redirect()->away($authFactory->getOAuthUrl());
    }

    public function callback(Request $request, string $provider)
    {
        $params = $request->all();
        $authFactory = AuthFactory::make($provider);
        try {
            $accessToken = $authFactory->getAccessToken($params['code']);
            $userInfo = $authFactory->getUserInfo($accessToken);
            $user = $this->userRepo->findByEmail($userInfo['email']);
            if (is_null($user)) {
                $newUserInfo = [
                    'name' => $userInfo['name'],
                    'email' => $userInfo['email'],
                    'avatar' => $userInfo['picture']
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
