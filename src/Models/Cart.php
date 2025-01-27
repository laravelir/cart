<?php

namespace Laravelir\Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravelir\Cart\Traits\HasUUID;

class Cart extends Model
{
    use HasUUID;

    protected $table = 'carts';

    // protected $fillable = ['name'];

    protected $guarded = [];


    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }


    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }

    // // public function products()
    // // {
    // //     return $this->hasMany(Product::class);
    // // }

    // public function getTotalProductPrice()
    // {
    //     $items = $this->items()->where('next_order', 0)->get();

    //     $amount = $items->map(function ($item) {
    //         //            if (!$item->size_id) {
    //         return $item->product->amount * $item->quantity;
    //         //            }

    //         //            return getProductSize(1, 6)->amount * $item->quantity;

    //     })->sum();

    //     return $amount;
    // }
}
