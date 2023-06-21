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
        return $this->model->all();
    }

    public function get($item)
    {
        return $this->model->firstWhere('id', $key);
    }

    public function add($data, $options = [])
    {
        $cartItem = $this->model->create();
    }

    public function update($item, $data, $options = [])
    {
        // TODO: Implement update() method.
    }

    public function has($item)
    {
        return $this->model->where('product_id', $key->id)->where('product_type', get_class($key))->exists();
    }

    public function delete($item)
    {
        if ($this->has($key)) {
            $this->model = $this->model->filter(function ($item) use ($key) {
                if ($key instanceof Model) {
                    return ($item['product_id'] != $key->id) && ($item['product_type'] != get_class($key));
                }
                return $key != $item['id'];
            });

            $this->session->put($this->key, $this->model);
            return true;
        }
        return false;
    }

    public function truncate()
    {
        return $this->model->truncate();
    }
}
