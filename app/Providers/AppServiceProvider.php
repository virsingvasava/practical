<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\ServiceRepositoryInterface;
use App\Repositories\ServiceRepository;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;

use App\Repositories\Contracts\AccountSettingRepositoryInterface;
use App\Repositories\AccountSettingRepository;

use App\Repositories\Contracts\LogRepositoryInterface;
use App\Repositories\LogRepository;

use App\Repositories\Contracts\TeamRepositoryInterface;
use App\Repositories\TeamRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AccountSettingRepositoryInterface::class, AccountSettingRepository::class);
        $this->app->bind(LogRepositoryInterface::class, LogRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
