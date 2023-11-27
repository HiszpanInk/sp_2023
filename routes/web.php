<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsDisplayController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BasketController;
use App\Http\Middleware\EnsureLogin;
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

Route::middleware(EnsureLogin::class)->group(function() {
    Route::get('/', function () {
        return view('index');
    })->name("index");

    Route::get('/products', [ProductsDisplayController::class, 'DisplayProducts'])->name("products");
    Route::get('/product/{id}', [ProductsDisplayController::class, 'DisplayProduct'])->name("product");
    Route::get('/product/{id}/add_to_basket', [BasketController::class, 'AddToBasket'])->name("add_to_basket");
    
    Route::get('/basket', [BasketController::class, 'ShowBasket'])->name("basket");

    Route::get('/finalise_order', [OrderController::class, 'FinaliseOrder'])->name("finalise_order");



    Route::get('/about', function () {
        return view('informacje');
    })->name("about");
    
    Route::get('/contact', function () {
        return view('kontakt');
    })->name("contact");

    Route::get('/delete_account_page', [UserController::class, 'delete_account_page'])->name("delete_account_page");
    Route::get('/delete_account', [UserController::class, 'delete_account'])->name("delete_account");

    Route::get('/change_password_page', function () {
        return view('change_password');
    })->name("change_password_page");
    Route::POST('/change_password', [UserController::class, 'change_password'])->name("change_password");

    Route::get('/user', function () {
        return view('user');
    })->name("user");
});

Route::get('/login', function () {
    return view('login');
})->name('login_page');

Route::get('/register', function () {
    return view('register');
})->name('register_page');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');