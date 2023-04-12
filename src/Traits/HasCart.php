<?php

namespace Laravelir\Cart\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravelir\Cart\Models\Cart;

trait HasCart
{
    public function cart(): MorphOne
    {
        return $this->morphOne(Cart::class, 'cartable');
    }
}
