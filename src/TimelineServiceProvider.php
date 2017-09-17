<?php

namespace Affenpilot\Timeline;

use Illuminate\Support\ServiceProvider;

class TimelineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('/migrations'),
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Affenpilot\Timeline\Controllers\TimelineController');
        $this->app->make('Affenpilot\Timeline\Controllers\PostController');
        $this->loadViewsFrom(__DIR__.'/Views', 'timeline');
    }
}
