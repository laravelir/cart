<?php

// config file for laravelir/cart
return [
    'key' => env('LARAVELIR_CART_KEY', 'key'),

    /**
     * drivers :
     * eloquent - cache - cookie - session
     */
    'driver' => env('LARAVELIR_CART_DRIVER', 'eloquent'),

    /**
     * for cookies
     */
    'lifetime' => 60 * 24 * 7,
];
