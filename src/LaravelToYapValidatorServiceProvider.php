<?php

namespace Ndobrovolsky\LaravelToYapValidator;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Ndobrovolsky\LaravelToYapValidator\Output\Script;
use Ndobrovolsky\LaravelToYapValidator\Input\FormResourceReader;
use Ndobrovolsky\LaravelToYapValidator\Generator\RulesGenerator;

class LaravelToYapValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->resolved('blade.compiler')) {
            $this->registerDirective($this->app['blade.compiler']);
        } else {
            $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
                $this->registerDirective($bladeCompiler);
            });
        }
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-to-yap-validator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-to-yap-validator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-to-yap-validator.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-to-yap-validator'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-to-yap-validator'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-to-yap-validator'),
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
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-to-yap-validator');

        // Register the main class to use with the facade
        /* $this->app->singleton('laravel-to-yap-validator', function () {
            return new LaravelToYapValidator;
        }); */
    }

    protected function registerDirective(BladeCompiler $bladeCompiler)
    {
        $bladeCompiler->directive('validationToYap', function () {
            $reader = new FormResourceReader();
            $resources = $reader->getInstances();
            $schemas = [];

            foreach ($resources as $name=> $instance ) {
                $rules = $instance->rules();
                $data = RulesGenerator::generate($rules);
                $schemas[$name] = $data;
            }

            return count($schemas) > 0 ? new Script($schemas) : '';
        });
    }
}
