<?php

namespace Ndobrovolsky\LaravelToYapValidator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ndobrovolsky\LaravelToYapValidator\Skeleton\SkeletonClass
 */
class LaravelToYapValidatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-to-yap-validator';
    }
}
