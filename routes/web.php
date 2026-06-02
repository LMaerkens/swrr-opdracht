
<?php
 use App\Http\Controllers\GebruikerController;
Route::get('/', function () {
    return view('home');
});

Route::get('/registreer', [GebruikerController::class, 'index'])->name('registreer.form');

Route::post('/registreer', [GebruikerController::class, 'store'])->name('registreer.submit');