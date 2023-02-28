<?php

// config file for laravelir/cart
return [
    /**
     * drivers :
     * eloquent - cache - cookie - session
     */
    'driver' => 'eloquent',

    'routes' => [
        'prefix' => 'cart',
        'middleware' => [],
    ],
];
