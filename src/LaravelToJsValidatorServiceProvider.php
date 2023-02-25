<?php

namespace DiSkyTech\LaravelToJsValidator;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class LaravelToJsValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-to-js-validator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-to-js-validator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-to-js-validator.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-to-js-validator'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-to-js-validator'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-to-js-validator'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-to-js-validator');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-to-js-validator', function () {
            return new LaravelToJsValidator;
        });
    }

    protected function registerDirective(BladeCompiler $bladeCompiler)
    {
        $bladeCompiler->directive('validationToJs', function ($group) {
            $validatorView = config('laravel-to-js-validator.view', 'laravel-to-js-validator::validator');

            return view($validatorView, [
                'schemas' => $group,
            ]);
        });
    }
}
