<?php

namespace Laravelir\Cart\Drivers;

class CookieDriver extends Driver
{

    public function all()
    {
        $cart = cookie()->get($this->key);
    }

    public function get($item)
    {
        // TODO: Implement get() method.
    }

    public function add($data, $options = [])
    {
        cookie()->queue('name', $data->toJson(), 60 * 24 * 7);

        $cart = collect(json_decode(cookie('name', true))) ?? collect([]);
    }

    public function update($item, $data, $options = [])
    {
        // TODO: Implement update() method.
    }

    public function has($item)
    {
        // TODO: Implement has() method.
    }

    public function delete($item)
    {
        // TODO: Implement delete() method.
    }

    public function truncate()
    {
        // TODO: Implement truncate() method.
    }
}
