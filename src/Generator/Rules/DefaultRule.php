<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator\Rules;

use Ndobrovolsky\LaravelToYupValidator\Generator\BaseRuleInterface;
use Ndobrovolsky\LaravelToYupValidator\Generator\BaseRule;

class DefaultRule implements BaseRuleInterface
{
    use BaseRule;

    public static function convert($rule)
    {
        return 'yup.mixed()' . self::getSubRules($rule);
    }
}