<?php

namespace Ndobrovolsky\LaravelToYupValidator\Generator;

interface BaseRuleInterface
{
    public static function convert($rule);
}