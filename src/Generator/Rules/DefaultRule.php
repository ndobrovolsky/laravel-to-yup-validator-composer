<?php

namespace DiSkyTech\LaravelToJsValidator\Generator\Rules;

use DiSkyTech\LaravelToJsValidator\Generator\BaseRuleInterface;
use DiSkyTech\LaravelToJsValidator\Generator\BaseRule;

class DefaultRule implements BaseRuleInterface
{
    use BaseRule;

    public static function convert($rule, $parser)
    {
        return 'yup.mixed()' . self::getSubRules($rule, $parser);
    }
}