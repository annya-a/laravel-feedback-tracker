<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CommentsProvider extends ServiceProvider
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
        $this->app->bind(\App\Domain\Comments\Services\CommentServiceContract::class, \App\Domain\Comments\Services\CommentService::class);
    }
}
