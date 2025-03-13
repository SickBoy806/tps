<?php

namespace App\Providers;

use App\Services\CustomSchemaManager;
use Illuminate\Support\ServiceProvider;

class CustomDatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('custom.schema', function ($app) {
            return new CustomSchemaManager();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}