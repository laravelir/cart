<?php

use Laravelir\Cart\Services\CartService;

if (!function_exists('cart')) {
    function cart()
    {
        return resolve(CartService::class);
    }
}

if (!function_exists('inCart')) {
    function inCart()
    {
        return resolve(CartService::class);
    }
}

if (!function_exists('cartItems')) {
    function cartItems()
    {
        return resolve(CartService::class);
    }
}
