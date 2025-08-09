<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\VideoRepositoryInterface;
use App\Helpers\ApiResponse;
use App\Services\Google\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
            Log::error($th);
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
            Log::error($th);
            return ApiResponse::internalServerError();
        }
    }

    public function getVideo(Request $request)
    {
        $params = $request->all();
        $video = $this->videoRepo->getVideo($params['video_id']);
        $isLike = false;
        $isMyVideo = false;
        $isFollow = false;
        if (count($video->likes) > 0) {
            foreach ($video->likes as $like) {
                if ($like->user_id == Auth::id()) {
                    $isLike = true;
                }
            }
        }
        if ($video->author_id == Auth::id()) {
            $isMyVideo = true;
        } else {
            $isFollow = $this->userRepo->find(Auth::id())->followers
                ->pluck('follow_id')->toArray();
            if (in_array(Auth::id(), $isFollow)) {
                $isFollow = true;
            }
        }
        $video->is_like = $isLike;
        $video->is_my_video = $isMyVideo;
        $video->is_follow = $isFollow;
        return ApiResponse::success($video);
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return ApiResponse::success();
        } catch (\Throwable $th) {
            Log::error($th);
            return ApiResponse::internalServerError();
        }
    }
}
