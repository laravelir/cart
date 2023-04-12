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

$user = auth()->user();

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
