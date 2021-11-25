<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShoppingCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('books', BookController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('loginak', [LoginController::class, 'index'])->name('loginak');
Route::get('registrak', [RegistrationController::class, 'index'])->name('registrak');

Route::resource('shippingPayment', \App\Http\Controllers\ShippingPaymentController::class);
//Route::post('shippingPayment', [\App\Http\Controllers\ShippingPaymentController::class, 'create'])->name('shippingPayment.create');
//Route::resource('shippingPayment', \App\Http\Controllers\ShippingPaymentController::class);
Route::resource('deliveryDetails', \App\Http\Controllers\DeliveryDetailsController::class);
//Route::post('deliveryDetails', [\App\Http\Controllers\DeliveryDetailsController::class, 'index'])->name('deliveryDetails.store');

//Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
//Route::post('/cart', [ShoppingCartController::class, 'store'])->name('cart.store');
Route::resource('cart', ShoppingCartController::class);

Route::put('cart/increment/{book}', [ShoppingCartController::class, 'incrementQuantity'])->name('cart.increment');
Route::put('cart/decrement/{book}', [ShoppingCartController::class, 'decrementQuantity'])->name('cart.decrement');

Route::get('admin/new', [\App\Http\Controllers\AdminBookDetailsController::class, 'new'])->name('admin.new');
Route::put('admin/picture', [\App\Http\Controllers\AdminBookDetailsController::class, 'picture'])->name('admin.picture');
Route::post('admin/create', [\App\Http\Controllers\AdminBookDetailsController::class, 'create'])->name('admin.create');
Route::resource('admin', \App\Http\Controllers\AdminBookDetailsController::class);
Route::post('admin/{book}', [\App\Http\Controllers\AdminBookDetailsController::class, 'change'])->name('admin.change');
Route::post('admin/', [\App\Http\Controllers\AdminBookDetailsController::class, 'review'])->name('admin.review');


require __DIR__.'/auth.php';
