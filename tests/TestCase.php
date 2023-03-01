<?php

namespace Ndobrovolsky\LaravelToYupValidator\Tests;

use \Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Ndobrovolsky\LaravelToYupValidator\LaravelToYupValidatorServiceProvider;

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
            LaravelToYupValidatorServiceProvider::class,
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