<?php

namespace DiSkyTech\LaravelToJsValidator\Generator\Rules;

use DiSkyTech\LaravelToJsValidator\Generator\BaseRuleInterface;
use DiSkyTech\LaravelToJsValidator\Generator\BaseRule;

class StringRule implements BaseRuleInterface
{
    use BaseRule;

    public static function convert($rule, $parser)
    {
        return 'yup.string()' . self::getSubRules($rule, $parser);
    }
}