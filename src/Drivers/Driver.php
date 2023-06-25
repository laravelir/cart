<?php

namespace Laravelir\Cart\Drivers;

use Illuminate\Auth\AuthManager;
use Laravelir\Cart\Contract\DriverContract;
use Illuminate\Contracts\Events\Dispatcher;

abstract class Driver implements DriverContract
{
    public $key;

    protected $instance;

    protected $events;

    protected $authManager;

    public function __construct(Dispatcher $events, AuthManager $authManager)
    {
        $this->key = config('cart.key');
        $this->events = $events;
        $this->authManager = $authManager;
    }

    public function instance(string $name): Driver
    {
        $this->instance = $name;
        return $this;
    }
}
