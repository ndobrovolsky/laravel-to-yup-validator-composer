<?php

namespace Ndobrovolsky\LaravelToYupValidator\Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Ndobrovolsky\LaravelToYupValidator\Tests\TestCase;
use Illuminate\Validation\ValidationRuleParser;
use Ndobrovolsky\LaravelToYupValidator\Generator\RulesGenerator;

use Ndobrovolsky\LaravelToYupValidator\Output\Script;
//FormResourceReader
use Ndobrovolsky\LaravelToYupValidator\Input\FormResourceReader;

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
