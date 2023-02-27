<?php

namespace Laravelir\Cart\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool all()
 * @method static bool get()
 * @method static bool add()
 * @method static bool has()
 * @method static bool update()
 * @method static bool delete()
 * @method static bool truncate()
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
