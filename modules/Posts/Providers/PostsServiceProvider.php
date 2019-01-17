<?php

namespace Modules\Posts\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class PostsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);

        // Bind service.
        $this->app->bind(\Modules\Posts\Services\PostServiceContract::class, \Modules\Posts\Services\PostService::class);

        // Bind service.
        $this->app->bind(
            \Modules\Posts\Services\PostCategoryServiceContract::class,
            \Modules\Posts\Services\PostCategoryService::class
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/posts');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/posts';
        }, \Config::get('view.paths')), [$sourcePath]), 'posts');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/posts');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'posts');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'posts');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        app(Factory::class)->load(__DIR__ . '/../Database/factories');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
