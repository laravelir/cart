<?php

namespace Laravelir\Cart\Drivers;

class CacheDriver extends Driver
{
    public function all()
    {
        $cart = cache()->get($this->key);
    }

    public function get($item)
    {
        // TODO: Implement get() method.
    }

    public function add($data, $options = [])
    {
        //
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
