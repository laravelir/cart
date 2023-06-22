<?php

namespace Laravelir\Cart\Providers;

use Laravelir\Cart\Facades\Cart;
use Illuminate\Support\Facades\Route;
use Laravelir\Cart\Facades\CartFacade;
use Illuminate\Support\ServiceProvider;
use Laravelir\Cart\Console\Commands\InstallPackageCommand;
use Laravelir\Cart\Services\CartService;

class CartServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/cart.php", 'cart');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();

        $this->registerRoutes();
    }

    private function registerFacades()
    {
        $this->app->bind('cart', function ($app) {
            return new CartService();
        });
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallPackageCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/cart.php' => config_path('cart.php')
        ], 'cart-config');
    }

    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/cart.php', 'cart-routes');
        });
    }

    private function routeConfiguration()
    {
        return [
            'prefix' => config('cart.routes.prefix'),
            'middleware' => config('cart.routes.middleware'),
            'as' => 'cart.'
        ];
    }

    protected function publishMigrations()
    {
        $timestamp = now();
        $this->publishes([
            __DIR__ . '/../database/migrations/create_cart_tables.stub' => database_path() . "/migrations/{$timestamp}_create_cart_tables.php",
        ], 'cart-migrations');
    }
}
