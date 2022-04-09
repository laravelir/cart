<?php

namespace Laravelir\Cart\Drivers;

abstract class Driver
{
    protected $instance;

    public function instance(string $name)
    {
        $this->instance = $name;
        return $this;
    }
}
