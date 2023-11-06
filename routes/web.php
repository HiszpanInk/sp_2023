<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('index');
})->name("index");

Route::get('/about', function () {
    return view('informacje');
})->name("about");

Route::get('/contact', function () {
    return view('kontakt');
})->name("contact");


Route::get('/login', function () {
    return view('login');
})->name('login_page');

Route::get('/register', function () {
    return view('register');
})->name('register_page');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');