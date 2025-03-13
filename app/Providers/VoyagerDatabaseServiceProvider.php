<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\Voyager\SchemaHandler;
use TCG\Voyager\Database\Types\Type;

class VoyagerDatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('voyager.database.schema', function ($app) {
            return new SchemaHandler();
        });

        // Override Voyager's Type class resolver
        if (class_exists(Type::class)) {
            app()->bind(Type::class, function ($app) {
                return $app->make('voyager.database.schema');
            });
        }
    }

    public function boot()
    {
        // Register any database types you need here
    }
}