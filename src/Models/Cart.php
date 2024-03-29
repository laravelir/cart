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

    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
