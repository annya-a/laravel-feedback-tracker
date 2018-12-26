<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VotesProvider extends ServiceProvider
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
        $this->app->bind(\App\Domain\Votes\Services\VoteServiceContract::class, \App\Domain\Votes\Services\VoteService::class);
    }
}
