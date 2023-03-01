<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator\Rules;

use Ndobrovolsky\LaravelToYupValidator\Generator\BaseRuleInterface;
use Ndobrovolsky\LaravelToYupValidator\Generator\BaseRule;

class StringRule implements BaseRuleInterface
{
    use BaseRule;

    public static function convert($rule, $parser)
    {
        return 'yup.string()' . self::getSubRules($rule, $parser);
    }
}