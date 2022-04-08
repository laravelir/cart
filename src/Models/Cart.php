<?php

namespace Laravelir\Cart\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

    // protected $fillable = ['name'];

    protected $guarded = [];
}
