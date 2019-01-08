<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
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
        $this->app->bind(
            \App\Domain\Categories\Services\CategoryServiceContract::class,
            \App\Domain\Categories\Services\CategoryService::class
        );
    }
}
