<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

use Ndobrovolsky\LaravelToYupValidator\Generator\BaseRuleInterface;
use Ndobrovolsky\LaravelToYupValidator\Generator\Rules\DefaultRule;

class RulesMapper
{
    public static function getRule($rules)
    {
        $rulesMap = config('laravel-to-yup-validator.rules');

        foreach(array_values($rules) as $value){
            $rule = $value['rule'];
            if (
                isset($rulesMap[$rule])
                && class_exists($rulesMap[$rule])
                && is_subclass_of($rulesMap[$rule], BaseRuleInterface::class)
            ) {
                return $rulesMap[$rule];
            }
        }

        return DefaultRule::class;
    }
}
