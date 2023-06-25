- [![Starts](https://img.shields.io/github/stars/laravelir/cart?style=flat&logo=github)](https://github.com/laravelir/cart/forks)
- [![Forks](https://img.shields.io/github/forks/laravelir/cart?style=flat&logo=github)](https://github.com/laravelir/cart/stargazers)
- [![Total Downloads](https://img.shields.io/packagist/dt/laravelir/cart.svg?style=flat-square)](https://packagist.org/packages/laravelir/cart)


# cart package (In Develop)

a multi driver shopping cart package

### Installation

1. Run the command below to add this package:

```
composer require laravelir/cart
```

2. Open your config/app.php and add the following to the providers/aliases array:

```php
Laravelir\Cart\Providers\CartServiceProvider::class,
```

```php
'Cart' => Laravelir\Cart\Facade\Cart::class,
```

3. Run the command below to install package:

```
php artisan cart:install
```



### Drivers

Session - Cookie - Eloquent - Cache

you can set your favorite driver in config file

eloquent driver need to authenticated user for save user's id



### How to use

add `HasCart` trait to User model

this trait has one method:
```php
$this->cart(); // return cart 
```

#### Methods

$cart = resolve(Cart());

$cart->all();

$cart->add();

$cart->has();

$cart->update();

$cart->count();

$cart->delete();

$cart->truncate();

#### Helpers
```php
cart();

cartItems();
```

Cart::user($user_id)->add();
Cart::driver('session')->add();
Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);

#### Usage 

$user = auth()->user();

$product = Product::first();

$cart = resolve(Cart()); 

$data = [
    'item' => $product,
    'title' => $product->title,
    'quantity' => 1,
    'price' => $product->price,
];

$options = [
    'color' => 'red',
    'size' => 'XL'
];
$user->cart->add($data, $options);


$data = [

];
Cart::update($itemId, $data);
Cart::update($itemId)->increaseQuantity();
Cart::update($itemId)->decreaseQuantity();
Cart::all();
Cart::count();
Cart::get($itemId);
Cart::delete($itemId);
Cart::truncate();


<!-- $item->options->has("size"); -->


#### Cartable Contract
For the convenience of faster adding items to cart and their automatic association, your model can implement Buyable interface. To do so, it must implement such functions:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product exends Model implements Cartable {

    public function getCartableId() {
        return $this->id;
    }

    public function getCartableTitle() {
        return $this->title;
    }

    public function getCartablePrice() {
        return $this->price;
    }
}
```



### Events

The cart has following events:

cart.added     - when an item added
cart.updated   - when an item cart updated
cart.deleted   - when an item deleted

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [miladimos](https://github.com/miladimos)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
