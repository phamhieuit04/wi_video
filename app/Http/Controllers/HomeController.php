<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getInfo(Request $request)
    {
        try {
            return ApiResponse::success($this->userRepo->getInfo(Auth::id()));
        } catch (\Throwable $th) {
            return ApiResponse::internalServerError();
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return ApiResponse::success();
        } catch (\Throwable $th) {
            return ApiResponse::internalServerError();
        }
    }
}
