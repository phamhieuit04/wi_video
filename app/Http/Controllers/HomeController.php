<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\VideoRepositoryInterface;
use App\Helpers\ApiResponse;
use App\Services\Google\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct(
        private  UserRepositoryInterface $userRepo,
        private  VideoRepositoryInterface $videoRepo,
        private GoogleDriveService $googleDriveService
    ) {}

    public function getInfo(Request $request)
    {
        try {
            return ApiResponse::success($this->userRepo->getInfo(Auth::id()));
        } catch (\Throwable $th) {
            return ApiResponse::internalServerError();
        }
    }

    public function uploadVideo(Request $request)
    {
        $params = $request->all();
        try {
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                Storage::disk('public')->put('uploads/videos', $video);
                $videoId = $this->googleDriveService->synchronize(
                    storage_path("app/public/uploads/videos/{$video->hashName()}"),
                    $video->hashName()
                );
                $video = $this->videoRepo->create([
                    'video_url' => "https://drive.google.com/file/d/$videoId/preview",
                    'caption' => $params['description'],
                    'author_id' => Auth::id(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            return ApiResponse::success();
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
