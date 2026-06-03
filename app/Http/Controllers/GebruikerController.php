<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Verwerk de registratie (invullen door andere developer).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // TODO: registratie logica hier
        return redirect('/');
    }
}
