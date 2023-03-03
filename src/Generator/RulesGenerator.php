<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

use Illuminate\Validation\Validator;
use Illuminate\Validation\ValidationRuleParser;
use Ndobrovolsky\LaravelToYupValidator\Generator\RulesMapper;

class RulesGenerator extends Validator
{
    public function __construct(array $rules)
    {
        parent::__construct(app('translator'), [], $rules);

    }

    public function generate()
    {
        $parser = new ValidationRuleParser([]);
        $rules = $this->rules;
        $result = [
            'rules' => [],
            'messages' => [],
        ];

        $parsedRules = array_map(function ($items) use ($parser) {
            $parsedRules = array_map(function ($item) use ($parser) {
                $parsed = $parser->parse($item);
                return [
                    'rule' => $parsed[0],
                    'attr' => $parsed[1],
                ];
            }, $items);
            return $parsedRules;
        }, $rules);

        foreach ($parsedRules as $name => $value) {
            $ruleClass = RulesMapper::getRule($value);
            $result['rules'][$name] = $ruleClass::convert($value);
            $result['messages'][$name] = array_reduce($value, function ($carry, $item) use ($name) {
                $carry[$item['rule']] = $this->makeReplacements($this->getMessage($name, $item['rule']), $name, $item['rule'], $item['attr']);
                return $carry;
            }, []);
        }
        return $result;
    }
}