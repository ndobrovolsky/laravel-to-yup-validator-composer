<?php

return [
    'rules' => [
        'string' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\StringRule::class,
        'integer' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\IntegerRule::class,
        'boolean' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\BooleanRule::class,
        'array' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\ArrayRule::class,
        'date' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\DateRule::class,
        'email' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\EmailRule::class,
        'file' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\FileRule::class,
        'image' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\ImageRule::class,
        'numeric' => Ndobrovolsky\LaravelToYapValidator\Generator\Rules\NumericRule::class,
    ],
    'resources_path' => 'Http/Requests'
];