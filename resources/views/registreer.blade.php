<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GebruikerController extends Controller
{
    public function index()
    {
        return view('registreer');
    }
}