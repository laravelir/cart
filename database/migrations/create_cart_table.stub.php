<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cartable_carts', function (Blueprint $table) {
            $table->id();
            $table->morphs('cartable'); // user
            $table->timestamps();
        });

        Schema::create('cartable_cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete();
            $table->morphs('cartable'); // product
            $table->unsignedBigInteger('quantity')->default(1);
            $table->unsignedBigInteger('price')->default(0);
            $table->boolean('for_next_order')->default(false); // if true item go to next order cart
            $table->text('options')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cartable_carts');
        Schema::dropIfExists('cartable_cart_items');
    }
};
