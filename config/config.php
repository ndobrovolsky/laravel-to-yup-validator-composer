<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'rules' => [
        'string' => DiSkyTech\LaravelToJsValidator\Generator\Rules\StringRule::class,
        'integer' => DiSkyTech\LaravelToJsValidator\Generator\Rules\IntegerRule::class,
        'boolean' => DiSkyTech\LaravelToJsValidator\Generator\Rules\BooleanRule::class,
        'array' => DiSkyTech\LaravelToJsValidator\Generator\Rules\ArrayRule::class,
        'date' => DiSkyTech\LaravelToJsValidator\Generator\Rules\DateRule::class,
        'email' => DiSkyTech\LaravelToJsValidator\Generator\Rules\EmailRule::class,
        'file' => DiSkyTech\LaravelToJsValidator\Generator\Rules\FileRule::class,
        'image' => DiSkyTech\LaravelToJsValidator\Generator\Rules\ImageRule::class,
        'numeric' => DiSkyTech\LaravelToJsValidator\Generator\Rules\NumericRule::class,
    ]
];