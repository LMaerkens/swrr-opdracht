<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GebruikerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('registreer');
});

Route::get('/registreer', [GebruikerController::class, 'index'])->name('registreer.form');
Route::post('/registreer', [GebruikerController::class, 'store'])->name('registreer.submit');
