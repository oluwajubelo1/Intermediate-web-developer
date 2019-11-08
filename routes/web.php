<?php

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

use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\CreditCardController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::redirect('/', '/customer');

Route::middleware('auth')->group(function () {
    Route::post('customer/{post}/restore', [CreditCardController::class, 'restore']);
    Route::resource('customer', CreditCardController::class, ['except' => ['show']]);
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
