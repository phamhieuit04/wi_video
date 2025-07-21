<?php

namespace App\Providers;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Contracts\Repositories\FollowRepositoryInterface;
use App\Contracts\Repositories\LikeRepositoryInterface;
use App\Contracts\Repositories\PushRepositoryInterface;
use App\Contracts\Repositories\ReportRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\VideoRepositoryInterface;
use App\Repositories\Comments\CommentRepository;
use App\Repositories\Follows\FollowRepository;
use App\Repositories\Likes\LikeRepository;
use App\Repositories\Pushes\PushRepository;
use App\Repositories\Reports\ReportRepository;
use App\Repositories\Users\UserRepository;
use App\Repositories\Videos\VideoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            FollowRepositoryInterface::class,
            FollowRepository::class
        );
        $this->app->singleton(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );
        $this->app->singleton(
            PushRepositoryInterface::class,
            PushRepository::class
        );
        $this->app->singleton(
            LikeRepositoryInterface::class,
            LikeRepository::class
        );
        $this->app->singleton(
            ReportRepositoryInterface::class,
            ReportRepository::class
        );
        $this->app->singleton(
            VideoRepositoryInterface::class,
            VideoRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
