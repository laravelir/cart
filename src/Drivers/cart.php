<?php

use App\Models\Product;

class CartManager
{
    public static function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_price'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_price'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'title', 'price']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'quantity' => 1,

                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    public static function removeItemCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    public static function incrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_price'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_price'];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    public static function decrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_price'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_price'];
                }
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    public static function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'total_price'));
    }

    public static function addCartItemsToCookie($cart_items)
    {
        cookie()->queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    public static function clearCartItems()
    {
        cookie()->queue(cookie()->forget('cart_items'));
    }

    public static function getCartItemsFromCookie()
    {
        $cart_items = json_decode(cookie()->get('cart_items'), true);
        if (!$cart_items) {
            $cart_items = [];
        }
        return $cart_items;
    }
}
