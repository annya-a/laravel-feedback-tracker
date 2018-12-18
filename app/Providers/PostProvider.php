<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Bind service.
        $this->app->bind(\Domain\Posts\Services\PostServiceContract::class, \Domain\Posts\Services\PostService::class);
    }
}
