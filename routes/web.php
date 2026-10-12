<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\user\clientController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\adminController;
// use Symfony\Component\Routing\Loader\Configurator\Routes;

Route::get('/', [pagesController::class, 'home'])->name('home');
Route::get('/about', [pagesController::class, 'about'])->name('about');
Route::get('/contact', [pagesController::class, 'contact'])->name('contact');
Route::get('/products', [pagesController::class, 'products'])->name('products');
Route::get('/cart', [pagesController::class, 'cart'])->name('cart');
Route::get('/checkout', [pagesController::class, 'checkout'])->name('checkout');
Route::get('/showproduct', [pagesController::class, 'showproduct'])->name('showproduct');
Route::get('/refund', [pagesController::class, 'refund'])->name('refund');
Route::get('/privacy', [pagesController::class, 'privacy'])->name('privacy');
Route::get('/faq', [pagesController::class, 'faq'])->name('faq');



Route::prefix('user')->group(function () {
    Route::get('/dashboard', [clientController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/orders', [clientController::class, 'orders'])->name('user.orders');
    Route::get('/settings', [clientController::class, 'settings'])->name('user.settings');
});



Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [adminController::class, 'dashboard'])->name('admin.dashboard');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });


Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('home'));
})->name('logout');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');