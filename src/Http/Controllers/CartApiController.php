<?php

namespace App\Http\Controllers\Api\V1\Shop;

use App\Http\Controllers\Api\V1\BaseApiController;
use App\Models\Product;
use Illuminate\Http\Request;

class CartApiController extends BaseApiController
{
    public function index()
    {
        $cart = cartItems();

        return $this->responseSuccess($cart);
    }

    public function updateQuantity(Request $request)
    {
        $product = Product::where('id', $request->pid)->exists();
        if (! $product) {
            return false;
        }

        $inCart = cart()->items->where('product_id', $product->pid)->first();
        if (! $inCart) {
            return false;
        }

        $inCart->update([
            'quantity' => $request->quantity,
        ]);

        return response()->json(true);
    }
}
