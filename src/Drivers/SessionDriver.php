<?php

namespace Laravelir\Cart\Drivers;

use Illuminate\Database\Eloquent\Model;

class SessionDriver extends Driver
{
    private $session;

    private $cart;

    public function __construct()
    {
        $this->session = session($this->key);
        $this->cart = session($this->key) ?? collect([]);
    }

    public function all()
    {
        return $this->cart;
    }

    public function add($data, $options = [])
    {
        $this->session->put($this->key, array_merge([$this->cart, $data]));
        return $this;
    }

    public function get($key)
    {
        //
    }

    public function has($key): bool
    {
        //
    }

    public function update($item, $data, $options = [])
    {
        //
    }

    public function delete($key)
    {
        //
    }

    public function truncate()
    {
        $this->session->truncate();
        return true;
    }
}
