<?php

namespace App\Providers;

use App\Application\Auth\PasswordHasher;
use App\Infrastructure\Service\BcryptPasswordHasher;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PasswordHasher::class, BcryptPasswordHasher::class);
    }
}
