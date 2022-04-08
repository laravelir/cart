<?php

namespace Laravelir\Cart\Providers;

use Illuminate\Support\ServiceProvider;
use Laravelir\Cart\Facades\CartFacade;
use Laravelir\Cart\Console\Commands\InstallCartCommand;
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

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerCommands();
        // $this->registerRoutes();
        // $this->registerBladeDirectives();
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

    // private function registerRoutes()
    // {
    //     Route::group($this->routeConfiguration(), function () {
    //         $this->loadRoutesFrom(__DIR__ . '/../../routes/dashboarder.php', 'dashboarder-routes');
    //     });
    // }

    // private function routeConfiguration()
    // {
    //     return [
    //         'prefix' => config('dashboarder.routes.prefix'),
    //         'middleware' => config('dashboarder.routes.middleware'),
    //         'as' => 'dashboarder.'
    //     ];
    // }

    // protected function publishMigrations()
    // {
    //     $this->publishes([
    //         __DIR__ . '/../database/migrations/create_dashboarder_tables.stub' => database_path() . "/migrations/{$timestamp}_create_dashboarder_tables.php",
    //     ], 'dashboarder-migrations');
    // }

    // protected function registerBladeDirectives()
    // {
    //     Blade::directive('format', function ($expression) {
            // return "<?php echo ($expression)->format('m/d/Y H:i') ?/>";
    //     });

    //     Blade::directive('config', function ($key) {
    //         return "<?php echo config('dashboarder.' . $key); ?/>";
    //     });
    // }
}
