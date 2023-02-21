<?php

namespace DiSkyTech\LaravelToYupValidator\Tests;

use \Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use DiSkyTech\LaravelToYupValidator\LaravelToYupValidatorServiceProvider;

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
}