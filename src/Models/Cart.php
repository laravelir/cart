<?php

namespace Laravelir\Cart\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Cart extends Model
{
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string)Uuid::uuid4();
        });
    }

    protected $table = 'cartable_carts';

    // protected $fillable = ['name'];

    protected $guarded = [];

    public function cartable(): MorphTo
    {
        return $this->morphTo(); // user
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
