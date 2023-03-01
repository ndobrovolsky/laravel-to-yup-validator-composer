<?php

namespace Ndobrovolsky\LaravelToYapValidator\Generator\Rules;

use Ndobrovolsky\LaravelToYapValidator\Generator\BaseRuleInterface;
use Ndobrovolsky\LaravelToYapValidator\Generator\BaseRule;

class StringRule implements BaseRuleInterface
{
    use BaseRule;

    public static function convert($rule, $parser)
    {
        return 'yup.string()' . self::getSubRules($rule, $parser);
    }
}