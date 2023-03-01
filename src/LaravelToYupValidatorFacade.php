<?php

namespace Ndobrovolsky\LaravelToYupValidator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ndobrovolsky\LaravelToYupValidator\Skeleton\SkeletonClass
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
