<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GebruikerController extends Controller
{
    public function index()
    {
        return view('registreer');
    }

    public function store(Request $request)
    {
        // Validatie van de invoer
        $validatedData = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email|unique:gebruikers,email',
            'wachtwoord' => 'required|string|min:6|confirmed',
        ]);

        // Opslaan van de gebruiker in de database
        // Gebruiker::create([
        //     'naam' => $validatedData['naam'],
        //     'email' => $validatedData['email'],
        //     'wachtwoord' => bcrypt($validatedData['wachtwoord']),
        // ]);

        // Redirect naar een succespagina of terug naar het formulier
        return redirect()->route('registreer.form')->with('success', 'Registratie succesvol!');
    }
}
