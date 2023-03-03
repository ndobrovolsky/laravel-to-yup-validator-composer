<?php

return [
    'rules' => [
        'String' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\StringRule::class,
        'Integer' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\IntegerRule::class,
        'Boolean' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\BooleanRule::class,
        'Array' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\ArrayRule::class,
        'Date' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\DateRule::class,
        'Email' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\EmailRule::class,
        'File' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\FileRule::class,
        'Image' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\ImageRule::class,
        'Numeric' => Ndobrovolsky\LaravelToYupValidator\Generator\Rules\NumericRule::class,
    ],
    'resources_path' => 'Http/Requests',
    'script_path' => 'resources/js/vendor/laravel-to-yup/index.js',
];