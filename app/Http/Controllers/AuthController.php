<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Factory\Auth\AuthFactory;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepo)
    {
    }

    public function redirect(Request $request, string $provider)
    {
        $authFactory = AuthFactory::make($provider);
        return ApiResponse::success($authFactory->getOAuthUrl());
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
                $user = $this->userRepo->create([
                    'name' => $userInfo['name'],
                    'email' => $userInfo['email'],
                    'avatar' => $userInfo['picture']
                ]);
            }
            $token = $user->createToken($user->email)->plainTextToken;
            return redirect()->away(env('APP_URL') . "/auth?code=$token?provider=$provider");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/auth');
        }
    }
}
