<?php

namespace Modules\HRPresentdaysByCard\Providers;

use Illuminate\Support\ServiceProvider;

class HRPresentdaysByCardServiceProvider extends ServiceProvider
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
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('hrpresentdaysbycard.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'hrpresentdaysbycard'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/hrpresentdaysbycard');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/hrpresentdaysbycard';
        }, \Config::get('view.paths')), [$sourcePath]), 'hrpresentdaysbycard');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/hrpresentdaysbycard');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'hrpresentdaysbycard');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'hrpresentdaysbycard');
        }
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
