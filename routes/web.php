<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::get('/auth/redirect', [GoogleController::class, 'login'])->name('auth.google');
Route::get('/auth/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');
Auth::routes();
Route::get('/register', function () {
    abort(404);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
