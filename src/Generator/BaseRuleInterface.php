<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

use Illuminate\Validation\ValidationRuleParser;

interface BaseRuleInterface
{
    public static function convert($rule, ValidationRuleParser $parser);
}