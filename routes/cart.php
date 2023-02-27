<?php

// routes of laravel/cart

use Illuminate\Support\Facades\Route;
use Laravelir\Cart\Http\Controllers\CartController;

Route::get('', [CartController::class => 'index']);
