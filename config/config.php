<?php

return [
    'rules' => [
        'string' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\StringRule::class,
        'integer' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\IntegerRule::class,
        'boolean' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\BooleanRule::class,
        'array' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\ArrayRule::class,
        'date' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\DateRule::class,
        'email' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\EmailRule::class,
        'file' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\FileRule::class,
        'image' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\ImageRule::class,
        'numeric' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\NumericRule::class,
    ],
    'resources_path' => 'Http/Requests'
];