<?php

// config file for laravelir/cart
return [
    'key' => 'cart',

    /**
     * drivers :
     * eloquent - cache - cookie - session
     */
    'driver' => 'eloquent',

    'routes' => [
        'prefix' => 'cart',
        'middleware' => [],
    ],

    /**
     * for cookies
     */
    'lifetime' => 60 * 24 * 7,
];
