<?php

namespace DiSkyTech\LaravelToJsValidator\Generator;

use DiSkyTech\LaravelToJsValidator\Generator\BaseRuleInterface;
use DiSkyTech\LaravelToJsValidator\Generator\Rules\DefaultRule;

class RulesMapper
{
    public static function getRule($rule)
    {
        $rulesMap = config('laravel-to-js-validator.rules');

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
