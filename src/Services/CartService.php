<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function all()
    {
        if (auth()->check()) {
            return user()->cart->items()->latest()->get();
        }

        return [];
    }

    public function add(array $item): bool
    {
        $product = Product::find($item['product_id']);
        if (! $product) {
            return false;
        }

        if ($cartItem = user()->cart->items->where('product_id', $product->id)->first()) {
            $cartItem?->increment('quantity');
        } else {

            $result = user()->cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
            ]);

            if (! $result) {
                return false;
            }
        }

        return true;
    }

    public function delete($item_id): bool
    {
        if ($item = user()->cart->items()->find($item_id)) {
            $item->delete();

            return true;
        }

        return false;
    }

    public function truncate(): bool
    {
        if (! user()->cart->items()->truncate()) {
            return false;
        }

        return true;
    }

    public function incrementQuantity($item_id)
    {
        if ($item = user()->cart->items()->find($item_id)) {
            $item->increment('quantity');

            return true;
        }

        return false;
    }

    public function decrementQuantity($item_id)
    {
        if ($item = user()->cart->items()->find($item_id)) {
            if ($item->quantity > 1) {
                $item->decrement('quantity');
            }

            return true;
        }

        return false;
    }
}
