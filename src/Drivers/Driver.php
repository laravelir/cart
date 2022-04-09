<?php

namespace Laravelir\Cart\Drivers;

use Laravelir\Cart\Contract\DriverContract;

abstract class Driver implements DriverContract
{
    protected $instance;

    public function instance(string $name)
    {
        $this->instance = $name;
        return $this;
    }
}
