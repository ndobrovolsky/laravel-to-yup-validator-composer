<?php

namespace Ndobrovolsky\LaravelToYupValidator;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Ndobrovolsky\LaravelToYupValidator\Output\Script;
use Ndobrovolsky\LaravelToYupValidator\Input\FormResourceReader;
use Ndobrovolsky\LaravelToYupValidator\Generator\RulesGenerator;

class LaravelToYupValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-to-yup-validator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-to-yup-validator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel_to_yup_validator.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel_to_yup_validator'),
            ], 'views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/assets' => resource_path('js/vendor/laravel_to_yup_validator'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel_to_yup_validator'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                Console\GenerateValidationScript::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-to-yup-validator');

        // Register the main class to use with the facade
        /* $this->app->singleton('laravel-to-yup-validator', function () {
            return new LaravelToYupValidator;
        }); */
    }
}
