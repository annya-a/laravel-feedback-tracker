<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\View\Factory as FactoryContract;
use App\Http\Views\Composers\CurrentUser;

class AuthServiceProvider extends ServiceProvider
{
     /**
     * AuthServiceProvider constructor.
     * @param $app
     */
    public function __construct($app)
    {
        parent::__construct($app);
    }

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Domain\Posts\Models\Post::class => \App\Domain\Posts\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(FactoryContract $viewFactory)
    {
        $this->registerPolicies();

        $viewFactory->composer('*', CurrentUser::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Bind service.
        $this->app->bind(\App\Domain\Users\Services\UserServiceContract::class, \App\Domain\Users\Services\UserService::class);

        // Bind service.
        $this->app->bind(
            \App\Domain\Users\Services\AuthServiceContract::class,
            \App\Domain\Users\Services\AuthService::class
        );
    }
}
