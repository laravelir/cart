<?php

namespace Laravelir\Cart\Services;

use Laravelir\Cart\Drivers\CacheDriver;
use Laravelir\Cart\Drivers\CookieDriver;
use Laravelir\Cart\Drivers\EloquentDriver;
use Laravelir\Cart\Drivers\SessionDriver;

class CartService
{
    private $driver;

    private $drivers = [
        'eloquent' => EloquentDriver::class,
        'session'  => SessionDriver::class,
        'cookie'   => CookieDriver::class,
        'cache'  => CacheDriver::class,
    ];

    public function __construct()
    {
        $this->driver = $this->setDriver();
    }

    public function setDriver()
    {
        $driver = config('cart.driver') ?? 'cookie';

        return array_key_exists($driver, $this->drivers) ?
            resolve($this->drivers[$driver]) : resolve($this->drivers['cookie']);
    }

    public function getDriver()
    {
        return [config('cart.driver') => $this->driver];
    }

    public function all()
    {
        return $this->driver->all();
    }

    public function get($item)
    {
        return $this->driver->get($item);
    }

    public function add(array $data, array $options = [])
    {
        return $this->driver->add($data, $options);
    }

    public function update($item, array $data, array $options = [])
    {
        return $this->driver->update($item, $data, $options);
    }

    public function has($item)
    {
        return $this->driver->has($item);
    }

    public function delete($item)
    {
        return $this->driver->delete($item);
    }

    public function truncate()
    {
        return $this->driver->truncate();
    }
}
