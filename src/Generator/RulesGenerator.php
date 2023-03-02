<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

use Illuminate\Validation\Validator;
use Ndobrovolsky\LaravelToYupValidator\Generator\RulesMapper;

class RulesGenerator extends Validator
{
    public function __construct(array $rules)
    {
        parent::__construct(app('translator'), [], $rules);

    }

    public function generate()
    {
        $rules = $this->rules;
        $result = [];
        $messages = [];
        foreach ($rules as $name => $value) {
            $rule = RulesMapper::getRule($value);
            $converted = $rule::convert($value);
            foreach ($value as $ruleAttr) {
                $messages[] = $this->getMessage($name, $ruleAttr);
            }
            
            $result[$name] = $converted;
        }
        return $result;
    }
}