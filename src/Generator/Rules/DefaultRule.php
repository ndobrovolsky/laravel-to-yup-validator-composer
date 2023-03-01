<?php

namespace Ndobrovolsky\LaravelToYapValidator\Generator\Rules;

use Ndobrovolsky\LaravelToYapValidator\Generator\BaseRuleInterface;
use Ndobrovolsky\LaravelToYapValidator\Generator\BaseRule;

class DefaultRule implements BaseRuleInterface
{
    use BaseRule;

    public static function convert($rule, $parser)
    {
        return 'yup.mixed()' . self::getSubRules($rule, $parser);
    }
}