<?php

namespace Maggomann\LaravelAddressable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Maggomann\LaravelAddressable\LaravelAddressable
 */
class LaravelAddressable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-addressable';
    }
}
