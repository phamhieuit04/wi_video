<?php

namespace App\Providers;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Contracts\Repositories\FollowRepositoryInterface;
use App\Contracts\Repositories\LikeRepositoryInterface;
use App\Contracts\Repositories\PushRepositoryInterface;
use App\Contracts\Repositories\ReportRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\VideoRepositoryInterface;
use App\Repositories\Comments\CommentEloquentRepository;
use App\Repositories\Follows\FollowEloquentRepository;
use App\Repositories\Likes\LikeEloquentRepository;
use App\Repositories\Pushes\PushEloquentRepository;
use App\Repositories\Reports\ReportEloquentRepository;
use App\Repositories\Users\UserEloquentRepository;
use App\Repositories\Videos\VideoEloquentRepository;
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
            UserEloquentRepository::class
        );
        $this->app->singleton(
            FollowRepositoryInterface::class,
            FollowEloquentRepository::class
        );
        $this->app->singleton(
            CommentRepositoryInterface::class,
            CommentEloquentRepository::class
        );
        $this->app->singleton(
            PushRepositoryInterface::class,
            PushEloquentRepository::class
        );
        $this->app->singleton(
            LikeRepositoryInterface::class,
            LikeEloquentRepository::class
        );
        $this->app->singleton(
            ReportRepositoryInterface::class,
            ReportEloquentRepository::class
        );
        $this->app->singleton(
            VideoRepositoryInterface::class,
            VideoEloquentRepository::class
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
