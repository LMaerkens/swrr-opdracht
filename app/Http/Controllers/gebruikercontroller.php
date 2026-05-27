<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GebruikerController extends Controller
{
    public function index()
    {
        return view('registreer');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255',
            'lidmaatschap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'voornaam' => $data['voornaam'],
            'achternaam' => $data['achternaam'],
            'lidmaatschap' => $data['lidmaatschap'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('registreer.form')->with('success', 'Account is aangemaakt!');
    }
}

