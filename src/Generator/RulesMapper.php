<?php

namespace Ndobrovolsky\LaravelToYapValidator\Generator;

use Ndobrovolsky\LaravelToYapValidator\Generator\BaseRuleInterface;
use Ndobrovolsky\LaravelToYapValidator\Generator\Rules\DefaultRule;

class RulesMapper
{
    public static function getRule($rule)
    {
        $rulesMap = config('laravel-to-yap-validator.rules');

        foreach(array_values($rule) as $value){
            if (
                isset($rulesMap[$value])
                && class_exists($rulesMap[$value])
                && is_subclass_of($rulesMap[$value], BaseRuleInterface::class)
            ) {
                return $rulesMap[$value];
            }
        }

        return DefaultRule::class;
    }
}
