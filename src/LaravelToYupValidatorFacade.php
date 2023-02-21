<?php

namespace DiSkyTech\LaravelToYupValidator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DiSkyTech\LaravelToYupValidator\Skeleton\SkeletonClass
 */
class LaravelToYupValidatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-to-yup-validator';
    }
}
