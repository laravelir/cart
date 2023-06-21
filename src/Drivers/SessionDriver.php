<?php

namespace Laravelir\Cart\Drivers;

use Illuminate\Database\Eloquent\Model;

class SessionDriver extends Driver
{
    private $session;

    private $cart;

    public function __construct()
    {
        $this->session = session();
        $this->cart = session('cart') ?? collect([]);
    }

    public function all()
    {
        return $this->cart;
    }

    public function add($data, $options = [])
    {
        $this->session->put('cart', $this->cart);
        return $this;
    }

    public function get($key)
    {
        return $key instanceof Model ?
            $this->cart->where('subject_id', $key->id)->where('subject_type', get_class($key))->first()
            : $this->cart->firstWhere('id', $key);
    }

    public function has($key): bool
    {
        if ($key instanceof Model) {
            return $this->cart->where('subject_id', $key->id)->where('subject_type', get_class($key))->exists();
        }

        return $this->cart->where('id', $key);
    }

    public function update($item, $data, $options = [])
    {
        //
    }

    public function delete($key)
    {
        if ($this->has($key)) {
            $this->cart = $this->cart->filter(function ($item) use ($key) {
                if ($key instanceof Model) {
                    return ($item['subject_id'] != $key->id) && ($item['subject_type'] != get_class($key));
                }
                return $key != $item['id'];
            });

            $this->session->put('cart', $this->cart);
            return true;
        }
        return false;
    }

    public function truncate()
    {
        //
    }

    protected function withRelationIfExists($item)
    {
        if (isset($item['subject_id']) && isset($item['subject_type'])) {
            $class = $item['subject_type'];
            $subject = (new $class)->find($item['subject_id']);
            $item[strtolower(class_basename($class))] = $subject;
            unset($item['subject_id']);
            unset($item['subject_type']);
            return $item;
        }
    }
}
