<?php

namespace Jpalala\SimplyJWT;

use Illuminate\Support\ServiceProvider;

class SimplyJWTServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register the JWTService class in the service container
        $this->app->singleton(JWTService::class, function ($app) {
            return new JWTService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // If your package has any routes, views, or config files, load them here.
    }
}

