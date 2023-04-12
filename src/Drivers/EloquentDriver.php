<?php

namespace Laravelir\Cart\Drivers;

use Laravelir\Cart\Models\Cart;

class EloquentDriver extends Driver
{
    private $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = resolve(Cart::class);
    }

    public function all()
    {
        return $this->model->l
    }

    public function get($item)
    {
        // TODO: Implement get() method.
    }

    public function add($data, $options = [])
    {
        // TODO: Implement add() method.
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
