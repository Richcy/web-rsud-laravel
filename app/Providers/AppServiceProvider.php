<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define a custom redirect for unauthenticated admin routes
        $this->app['router']->aliasMiddleware('auth.admin', \App\Http\Middleware\AdminAuthMiddleware::class);
    }
}
