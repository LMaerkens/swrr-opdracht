<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GebruikerController extends Controller
{
    /**
     * Toon het registratieformulier.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('registreer');
    }

    /**
     * Verwerk de registratie: maak een nieuwe gebruiker aan
     * en stuur door naar de huisjes-pagina.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Maak de gebruiker aan met standaard rol 'user'
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'user',
        ]);

        // Log de nieuwe gebruiker direct in
        auth()->login($user);

        // Vernieuw de sessie na inloggen (voorkomt session fixation)
        // en wist eventuele oude 'intended' redirect-URLs
        request()->session()->regenerate();

        // Stuur door naar huisjes overzicht
        return redirect()->route('huisjes.index')
                         ->with('succes', '👋 Welkom, ' . $user->name . '! Je bent geregistreerd.');
    }
}
