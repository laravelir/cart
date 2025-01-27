<?php

namespace Laravelir\Cart\Models;

use Laravelir\Cart\Models\Cart;
use Laravelir\Cart\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CartItem extends Model
{
    use HasUUID;

    protected $table = 'cart_items';

    // protected $fillable = ['name'];

    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }
}
