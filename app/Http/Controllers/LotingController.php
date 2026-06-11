<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inschrijving;

class LotingController extends Controller
{
    public function index(Request $request)
    {
        $inschrijvingen = Inschrijving::orderBy('created_at', 'desc')->get();
        $winners = [];

        if ($request->boolean('draw') && $inschrijvingen->count() > 0) {
            $winners = Inschrijving::inRandomOrder()->take(3)->get();
        }

        return view('lotingblad', compact('inschrijvingen', 'winners'));
    }
}
