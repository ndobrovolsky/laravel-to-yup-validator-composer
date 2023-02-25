<?php

namespace DiSkyTech\LaravelToJsValidator\Tests;

use \Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use DiSkyTech\LaravelToJsValidator\LaravelToJsValidatorServiceProvider;

class TestCase extends OrchestraTestCase
{
    use InteractsWithViews;

    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelToJsValidatorServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }

    /* public static function applicationBasePath()
    {
        return __DIR__.'/Laravel';
    } */
}