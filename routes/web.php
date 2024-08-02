<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'showProducts']);

Route::get('cart', [ProductController::class, 'showCartTable']);
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart']);
Route::patch('update-cart', [ProductController::class, 'updateCart']);

Route::delete('remove-from-cart', [ProductController::class, 'removeCartItem']);
Route::GET('clear-cart', [ProductController::class, 'clearCart']);
Route::get('payment', [ProductController::class, 'checkout']);

