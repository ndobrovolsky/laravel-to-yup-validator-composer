<?php

namespace Ndobrovolsky\LaravelToYapValidator\Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Ndobrovolsky\LaravelToYapValidator\Tests\TestCase;
use Illuminate\Validation\ValidationRuleParser;
use Ndobrovolsky\LaravelToYapValidator\Generator\RulesGenerator;

use Ndobrovolsky\LaravelToYapValidator\Output\Script;
//FormResourceReader
use Ndobrovolsky\LaravelToYapValidator\Input\FormResourceReader;

class RequestRulesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {

        $dir = __DIR__ . '/../Requests';
        $reader = new FormResourceReader($dir);
        $resources = $reader->getInstances();
        $schemas = [];

        foreach ($resources as $name=> $instance ) {
            $rules = $instance->rules();
            $data = RulesGenerator::generate($rules);
            $schemas[$name] = $data;
        }

        $script = new Script($schemas) . '';
    }
}
