<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

trait BaseRule
{
    private static function getSubRules($rule, $parser)
    {
        $subRules = '';
        foreach ($rule as $value) {
            $ruleAttr = $parser->parse($value);
            $ruleAttrName = $ruleAttr[0] ?? '';
            switch ($ruleAttrName) {
                case 'Nullable':
                    $subRules .= '.nullable()';
                    break;
                case 'Required':
                    $subRules .= '.required()';
                    break;
                case 'Min':
                    $minVal = $ruleAttr[1][0] ?? '';
                    $subRules .= '.min(' . $minVal . ')';
                    break;
                case 'Max':
                    $maxVal = $ruleAttr[1][0] ?? '';
                    $subRules .= '.max(' . $maxVal . ')';
                    break;
                case 'Size':
                    $sizeVal = $ruleAttr[1][0] ?? '';
                    $subRules .= '.length(' . $sizeVal . ')';
                    break;
            }
        }
        return $subRules;
    }
}
