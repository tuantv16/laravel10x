<?php

namespace App\Providers;

use App\Contracts\Repositories\UserRepository;
use App\Repositories\Eloquents\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        //    $this->app->bind(
        //     'App\Contracts\Repositories\UserRepository',
        //     'App\Repositories\Eloquents\EloquentUserRepository'
        //     );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
