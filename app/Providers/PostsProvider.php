<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostsProvider extends ServiceProvider
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
        $this->app->bind(\App\Domain\Posts\Services\PostServiceContract::class, \App\Domain\Posts\Services\PostService::class);

        // Bind service.
        $this->app->bind(
            \App\Domain\Posts\Services\PostCategoryServiceContract::class,
            \App\Domain\Posts\Services\PostCategoryService::class
        );
    }
}
