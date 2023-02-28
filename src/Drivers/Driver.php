<?php

namespace Laravelir\Cart\Drivers;

use Laravelir\Cart\Contract\DriverContract;

abstract class Driver implements DriverContract
{
    public $key;

    public function __construct()
    {
        $this->key = config('cart.key');
    }

    protected $instance;

    public function instance(string $name)
    {
        $this->instance = $name;
        return $this;
    }
}
