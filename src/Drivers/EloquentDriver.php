<?php

namespace Laravelir\Cart\Drivers;

use Laravelir\Cart\Models\Cart;

class EloquentDriver extends Driver
{
    private $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = resolve(Cart::class);
    }

    public function all()
    {
        return $this->model->items()->all();
        if (auth()->check()) {
            return user()->cart->items()->latest()->get();
        }

        return [];
    }

    public function get($item)
    {
        return $this->model->items()->firstWhere('id', $item);
    }

    public function add($data, $options = [])
    {
        $cartItem = $this->model->items()->create();
        $this->events->dispatch('cart.added');
        return $this;

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

    public function update($item, $data, $options = [])
    {
        $this->model->where('id', $item)->update([]);
    }

    public function has($item)
    {
        return $this->model->items()->where('product_id', $item->id)->where('product_type', get_class($item))->exists();
    }

    public function delete($item)
    {
        if ($item = user()->cart->items()->find($item_id)) {
            $item->delete();

            return true;
        }

        return false;
        return $this->model->where()->delete();
    }

    public function truncate()
    {
        return $this->model->items()->truncate();
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





class CartService2
{
    public function __construct(private ?Cart $cart = null)
    {
        $this->current();
    }

    public function getCurrent()
    {
        return $this->cart;
    }

    public function current()
    {
        $user = Auth::user();
        if ($user) {
            $this->cart = Cart::where('user_id', $user->id)
                ->firstOrCreate([
                    'user_id' => $user->id,
                ]);
        } else {
            $token = $this->getCurrentCartToken();
            $this->cart = Cart::where('token', $token)
                ->firstOrCreate([
                    'token' => $token,
                ]);
        }
    }

    public function hasCourse(Course $course)
    {
        return $this->cart->items()
            ->where('course_id', $course->id)
            ->exists();
    }

    public function add(Course $course)
    {
        if (! $this->hasCourse($course)) {
            $this->cart->items()->create([
                'course_id' => $course->id,
                'price' => $course->price,
            ]);
        }
    }

    public function remove(Course $course)
    {
        return $this->cart->items()
            ->where(['course_id' => $course->id])
            ->delete();
    }

    public function isEmpty()
    {
        return ! $this->cart->items()->exists();
    }

    public function applyDiscountToCartItem(string $code)
    {
        // search for each item where this coupon is valid
    }

    public function clear()
    {
        $this->cart->items()->delete();
    }

    protected function getCurrentCartToken()
    {
        $token = request()->header('X-CART-TOKEN');

        if (! $token) {
            $token = (string)Str::ulid();
            request()->headers->set('X-CART-TOKEN', $token);
        }

        return $token;
    }
}
