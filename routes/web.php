<?php

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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('registreer');
    })->name('register');

    Route::post('/register', [App\Http\Controllers\UserController::class, 'store']);

    Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});

// Temporary debug route to list users (remove in production)
Route::get('/debug-users', function () {
    return App\Models\User::all();
});

// Lightweight health/debug route — returns only number of users
Route::get('/debug-users-count', function () {
    return ['count' => App\Models\User::count()];
});

// Simple health check without DB
Route::get('/ping', function () {
    return response('ok', 200);
});

