<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HuisjeController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/registreer', [UserController::class, 'index'])->name('registreer.form');
Route::post('/registreer', [UserController::class, 'store'])->name('registreer.submit');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'store']);

// Email verification routes - PUBLIC (no auth required)
Route::get('/email/verify-sent', function () {
    return view('auth.verify-sent');
})->name('verification.sent');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
    // Find user by ID
    $user = User::find($id);
    
    if (!$user) {
        return redirect('/login')->with('error', 'Verificatielink is ongeldig.');
    }
    
    // Verify the hash matches the user's email
    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        return redirect('/login')->with('error', 'Verificatielink is ongeldig.');
    }
    
    // Check if already verified
    if ($user->hasVerifiedEmail()) {
        return redirect('/login')->with('success', 'Je e-mail is al geverifieerd! Je kunt nu inloggen.');
    }
    
    // Mark as verified
    $user->markEmailAsVerified();
    
    return redirect('/login')->with('success', 'Je e-mail is geverifieerd! Je kunt nu inloggen.');
})->middleware('signed')->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Er is een nieuwe verificatie-e-mail verzonden.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// DEV ONLY: Manual verification helper (for development/testing)
Route::get('/dev/verify-user/{id}', function ($id) {
    if (!app()->environment('local')) {
        return response('Not allowed', 403);
    }
    $user = User::find($id);
    if (!$user) {
        return "User not found";
    }
    $user->markEmailAsVerified();
    return "User {$user->email} verified!";
})->name('dev.verify-user');

// Huisjes Routes
Route::resource('huisjes', HuisjeController::class);

// Boeking Page
Route::view('/boeking', 'boeking.index')->name('boeking');

// Voorwaarden Page
Route::view('/voorwaarden', 'voorwaarden')->name('voorwaarden');
