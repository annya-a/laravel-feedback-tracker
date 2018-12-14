<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FeaturesProvider extends ServiceProvider
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
        $this->app->bind(\Domain\Features\Services\FeatureServiceContract::class, \Domain\Features\Services\FeatureService::class);
    }
}
