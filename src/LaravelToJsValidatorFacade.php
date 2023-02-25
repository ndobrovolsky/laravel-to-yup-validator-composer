<?php

namespace DiSkyTech\LaravelToJsValidator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DiSkyTech\LaravelToJsValidator\Skeleton\SkeletonClass
 */
class LaravelToJsValidatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-to-js-validator';
    }
}
