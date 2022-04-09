<?php

use Laravelir\Cart\Services\CartService;

if (!function_exists('cart')) {
    function cart()
    {
        return resolve(CartService::class);
    }
}
