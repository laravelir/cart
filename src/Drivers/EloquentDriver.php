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
        return $this->model->items()->all();
    }

    public function get($item)
    {
        return $this->model->items()->firstWhere('id', $key);
    }

    public function add($data, $options = [])
    {
        $cartItem = $this->model->items()->create();
        $this->events->dispatch('cart.added');
        return $this;
    }

    public function update($item, $data, $options = [])
    {
        $this->model->where('id', $item)->update([]);
    }

    public function has($item)
    {
        return $this->model->items()->where('product_id', $key->id)->where('product_type', get_class($key))->exists();
    }

    public function delete($item)
    {
        return $this->model->where()->delete();
    }

    public function truncate()
    {
        return $this->model->items()->truncate();
    }
}
