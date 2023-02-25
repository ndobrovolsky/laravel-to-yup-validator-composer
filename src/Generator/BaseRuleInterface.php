<?php

namespace DiSkyTech\LaravelToJsValidator\Generator;

use Illuminate\Validation\ValidationRuleParser;

interface BaseRuleInterface
{
    public static function convert($rule, ValidationRuleParser $parser);
}