<?php

namespace Laravelir\Cart\Models;

use Laravelir\Cart\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramsey\Uuid\Uuid;

class CartItem extends Model
{
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string)Uuid::uuid4();
        });
    }

    protected $table = 'cartable_cart_items';

    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function cartable(): MorphTo
    {
        return $this->morphTo(); // product
    }
}
