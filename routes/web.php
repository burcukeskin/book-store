<?php

use App\Http\Controllers\panel\AboutController;
use App\Http\Controllers\panel\Book_Details_Controller;
use App\Http\Controllers\panel\CartController;
use App\Http\Controllers\panel\CategoryController;
use App\Http\Controllers\panel\CheckoutController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class , 'index'])->name('login-page');
Route::post('/login-post', [AuthController::class , 'login'])->name('login-post');
Route::get('/register', [AuthController::class , 'register'])->name('register-page');
Route::post('/register-post', [AuthController::class , 'registerSave'])->name('register-post');


Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/book-detail/{id}', [Book_Details_Controller::class, 'show'])->name('book-detail');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/{productId}', [CartController::class, 'store'])->name('cart.store');
//Route::post('/cart', [CartController::class, 'setQuantity'])->name('cart.setQuantity');
Route::delete('/cart/{productId}', [CartController::class, 'destroy'])->name('cart.delete');


Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');



