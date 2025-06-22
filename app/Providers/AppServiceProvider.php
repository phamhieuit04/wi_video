<?php

namespace App\Providers;

use App\Repositories\Comments\CommentEloquentRepository;
use App\Repositories\Comments\CommentRepositoryInterface;
use App\Repositories\Follows\FollowEloquentRepository;
use App\Repositories\Follows\FollowRepositoryInterface;
use App\Repositories\Likes\LikeEloquentRepository;
use App\Repositories\Likes\LikeRepositoryInterface;
use App\Repositories\Pushes\PushEloquentRepository;
use App\Repositories\Pushes\PushRepositoryInterface;
use App\Repositories\Reports\ReportEloquentRepository;
use App\Repositories\Reports\ReportRepositoryInterface;
use App\Repositories\Users\UserEloquentRepository;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\Videos\VideoEloquentRepository;
use App\Repositories\Videos\VideoRepositoryInterface;
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
