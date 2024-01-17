<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.home');
})->name('index');

Route::get('cart', function () {
    return view('pages.cart');
})->name('cart');

Route::get('detail', function () {
    return view('pages.detail');
})->name('detail');

Route::get('shop', function () {
    return view('pages.shop');
})->name('shop');

Route::get('checkout', function () {
    return view('pages.checkout');
})->name('checkout');
