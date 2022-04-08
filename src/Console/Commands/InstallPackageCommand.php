<?php

namespace Laravelir\Cart\Console\Commands;

use Illuminate\Console\Command;

class InstallPackageCommand extends Command
{
    protected $signature = 'cart:install';

    protected $description = 'Install the cart Package';

    public function handle()
    {
        $this->line("\t... Welcome To Package Installer ...");


        //config
        if (File::exists(config_path('cart.php'))) {
            $confirm = $this->confirm("cart.php already exist. Do you want to overwrite?");
            if ($confirm) {
                $this->publishConfig();
                $this->info("config overwrite finished");
            } else {
                $this->info("skipped config publish");
            }
        } else {
            $this->publishConfig();
            $this->info("config published");
        }


        // if (!empty(File::glob(database_path('migrations\*_create_carts_tables.php')))) {

        //     $list  = File::glob(database_path('migrations\*_create_carts_tables.php'));
        //     collect($list)->each(function ($item) {
        //         File::delete($item);
        //     });

        //     $this->publishMigration();
        // } else {
        //     $this->publishMigration();
        // }

        // if (!empty(File::glob(database_path('migrations\*_create_cart_table.php')))) {
        //     $list  = File::glob(database_path('migrations\*_create_cart_table.php'));
        //     collect($list)->each(function ($item) {
        //         File::delete($item);
        //         $this->warn("Deleted: " . $item);
        //     });
        //     $this->publishMigration();
        // } else {
        //     $this->publishMigration();
        // }

        $this->info("Package Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }


    private function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\Cart\\Providers\\CartServiceProvider",
            '--tag'      => 'cart-config',
            '--force'    => true
        ]);
    }

    private function publishMigration()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\Cart\\Providers\\CartServiceProvider",
            '--tag'      => 'cart-migrations',
            '--force'    => true
        ]);
    }
}
