<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

use Illuminate\Validation\ValidationRuleParser;

trait BaseRule
{
    private static function getSubRules($rules)
    {
        $subRules = '';

        foreach ($rules as $ruleData) {
            $rule = $ruleData['rule'];
            $attr = $ruleData['attr'];
            switch ($rule) {
                case 'Nullable':
                    $subRules .= '.nullable()';
                    break;
                case 'Required':
                    $subRules .= '.required()';
                    break;
                case 'Min':
                    $minVal = $attr[0] ?? '';
                    $subRules .= '.min(' . $minVal . ')';
                    break;
                case 'Max':
                    $maxVal = $attr[0] ?? '';
                    $subRules .= '.max(' . $maxVal . ')';
                    break;
                case 'Size':
                    $sizeVal = $attr[0] ?? '';
                    $subRules .= '.length(' . $sizeVal . ')';
                    break;
            }
        }
        return $subRules;
    }
}
