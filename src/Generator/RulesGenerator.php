<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

use Illuminate\Validation\ValidationRuleParser;
use Ndobrovolsky\LaravelToYupValidator\Generator\RulesMapper;

class RulesGenerator
{
    public static function generate($rules)
    {
        $parser = new ValidationRuleParser([]);
        $parsed = self::parseRules($rules, $parser);
        $result = [];
        foreach ($parsed as $name => $value) {
            $rule = RulesMapper::getRule($value);
            $converted = $rule::convert($value, $parser);
            
            $result[$name] = $converted;
        }
        return $result;
    }

    private static function parseRules($rules, $parser)
    {
        $response = $parser->explode(ValidationRuleParser::filterConditionalRules($rules));
        return $response->rules;
    }
}