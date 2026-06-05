    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\HuisjeController;

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

    // Huisjes Routes
    Route::resource('huisjes', HuisjeController::class)->except(['show']);

    // Boeking Page
    Route::view('/boeking', 'boeking.index')->name('boeking');

    // Voorwaarden Page
    Route::view('/voorwaarden', 'voorwaarden')->name('voorwaarden');
