<?php

namespace Laravelir\Cart\Providers;

use Illuminate\Support\ServiceProvider;
use Laravelir\Cart\Console\Commands\InstallPackageCommand;
use Laravelir\Cart\Facades\Cart;

class CartServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/cart.php", 'cart');

        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->registerFacades();
    }

    public function boot()
    {
        $this->registerCommands();
    }

    private function registerFacades()
    {
        $this->app->bind('cart', function ($app) {
            return new Cart();
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

    protected function publishMigrations()
    {
        $timestamp = now();
        $this->publishes([
            __DIR__ . '/../database/migrations/create_cart_table.stub.php' => database_path() . "/migrations/{$timestamp}_create_cart_tables.php",
        ], 'cart-migrations');
    }
}
