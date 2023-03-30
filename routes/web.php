<?php

use App\Http\Controllers\LoginController;
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

Route::controller(LoginController::class)->middleware(['guest'])->group(function () {
    Route::get('/', 'index')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/forgot_password', 'forgot_password')->name('forgot_password');
    Route::post('/register', 'process_register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
});