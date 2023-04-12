<?php

namespace Laravelir\Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravelir\Cart\Traits\HasUUID;

class CartItem extends Model
{
    use HasUUID;

    protected $table = 'cart_items';

    // protected $fillable = ['name'];

    protected $guarded = [];

    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }
}
