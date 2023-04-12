<?php

namespace Laravelir\Cart\Drivers;

use Laravelir\Cart\Contract\DriverContract;

abstract class Driver implements DriverContract
{
    public $key;

    protected $instance;

    public function __construct()
    {
        $this->key = config('cart.key');
    }

    public function instance(string $name): Driver
    {
        $this->instance = $name;
        return $this;
    }
}
