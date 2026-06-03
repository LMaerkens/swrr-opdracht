<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\HuisjeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Startpagina → registreer
Route::get('/', function () {
    return view('registreer');
});

// Registreer routes
Route::get('/registreer',  [GebruikerController::class, 'index'])->name('registreer.form');
Route::post('/registreer', [GebruikerController::class, 'store'])->name('registreer.submit');

// Huisjes overzicht (iedereen mag kijken)
Route::get('/huisjes', [HuisjeController::class, 'index'])->name('huisjes.index');

// Huisje aanmaken (admin)
Route::get('/huisjes/nieuw',    [HuisjeController::class, 'create'])->name('huisjes.create');
Route::post('/huisjes',         [HuisjeController::class, 'store'])->name('huisjes.store');

// Huisje bewerken (admin)
Route::get('/huisjes/{id}/bewerken', [HuisjeController::class, 'edit'])->name('huisjes.edit');
Route::put('/huisjes/{id}',          [HuisjeController::class, 'update'])->name('huisjes.update');

// Huisje verwijderen (admin)
Route::delete('/huisjes/{id}', [HuisjeController::class, 'destroy'])->name('huisjes.destroy');

// Boeking pagina (lege placeholder)
Route::get('/boeking', function () {
    return view('boeking.index');
})->name('boeking');

// ---------------------------------------------------------------
// TIJDELIJKE TESTROUTES – verwijder deze vóór productie!
// ---------------------------------------------------------------

// Log in als admin (voor testen van admin-knoppen)
Route::get('/test-login-admin', function () {
    $admin = \App\Models\User::where('email', 'admin@test.nl')->first();
    if ($admin) {
        auth()->login($admin);
        return redirect('/huisjes')->with('succes', '✅ Ingelogd als admin: ' . $admin->name);
    }
    return 'Admin niet gevonden.';
})->name('test.login.admin');

// Log in als normale gebruiker (voor testen zonder admin-knoppen)
Route::get('/test-login-user', function () {
    $user = \App\Models\User::where('email', 'user@test.nl')->first();
    if ($user) {
        auth()->login($user);
        return redirect('/huisjes')->with('succes', '👤 Ingelogd als gebruiker: ' . $user->name);
    }
    return 'Gebruiker niet gevonden.';
})->name('test.login.user');

// Log uit (voor testen)
Route::get('/test-logout', function () {
    auth()->logout();
    return redirect('/huisjes')->with('succes', '👋 Je bent uitgelogd.');
})->name('test.logout');
