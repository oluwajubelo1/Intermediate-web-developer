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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::redirect('/', '/credit');

Route::middleware('auth')->group(function () {
    Route::post('credit/{post}/restore', [CreditCardController::class, 'restore']);
    Route::put('customer/{id}/{isBlocked}', 'CustomerController@action')->name('customer.action');
    Route::delete('customer/{id}', 'CustomerController@deleteUser')->name('customer.delete');
    Route::resource('credit', CreditCardController::class, ['except' => ['show']]);
    Route::resource('customer', CustomerController::class, ['except' => 'show']);
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
