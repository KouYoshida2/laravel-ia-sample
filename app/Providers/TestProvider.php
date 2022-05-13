<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ContainerTest;

class TestProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('containertest', 'App\Services\ContainerTest');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
