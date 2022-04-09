<?php

namespace Laravelir\Cart\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool has()
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
