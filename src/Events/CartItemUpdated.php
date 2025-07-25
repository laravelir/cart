<?php

namespace Laravelir\Cart\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Laravelir\Cart\Models\CartItem;

class CartItemUpdate implements ShouldDispatchAfterCommit
{
    use SerializesModels, Dispatchable, InteractsWithSockets;

    public function __construct(public CartItem $cartItem) {}
}
