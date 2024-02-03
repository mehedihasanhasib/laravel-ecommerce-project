<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

Route::post('deleteCartItem/{id}', [OrderController::class, 'deleteCartItem'])
    ->middleware(['auth', 'verified'])
    ->name('deleteCartItem');

Route::get('detail/{product_id}', [ProductController::class, 'show'])
    ->name('detail');

Route::get('shop', [ProductController::class, 'index'])
    ->name('shop');

Route::get('checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('myorders', [OrderController::class, 'myorders'])
    ->middleware(['auth', 'verified'])
    ->name('myorders');

Route::post('addcart/{id}', [OrderController::class, 'addcart'])
    ->name('addcart');

Route::post('order', [OrderController::class, 'order'])
    ->middleware(['auth', 'verified'])
    ->name('order');


/* Admin Routes */
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.log_in');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware(['admin']);
    Route::get('dashboard', [ProductController::class, 'dashboard'])->name('dashboard')->middleware(['admin']);
    Route::get('addproduct', [ProductController::class, 'addproduct'])->name('addproduct')->middleware(['admin']);
    Route::get('productlist', [ProductController::class, 'productlist'])->name('productlist')->middleware(['admin']);
});

Route::resource('product', ProductController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['admin']);
/* Admin Routes */




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
