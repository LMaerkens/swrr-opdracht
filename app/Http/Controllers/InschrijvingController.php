<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inschrijving;

class InschrijvingController extends Controller
{
    public function create()
    {
        return view('inschrijving');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'naam' => 'required|string|max:255',
            'adres' => 'required|string|max:255',
            'postcode' => 'required|string|max:50',
            'telefoon' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'personen' => 'required|integer|min:1',
            'ben_je_lid' => 'nullable|string|max:10',
            'lidnummer' => 'nullable|string|max:100',
            'holiday' => 'nullable|string|max:100',
            'type_verblijf' => 'nullable|string|max:50',
            'keus1_van' => 'nullable|date',
            'keus1_tot' => 'nullable|date',
            'keus2_van' => 'nullable|date',
            'keus2_tot' => 'nullable|date',
            'huisje' => 'nullable|array',
            'huisje.*' => 'string|max:100',
            'toelichting' => 'nullable|string',
            'akkoord' => 'accepted',
        ]);

        // If multiple huisje inputs are present as array, join them
        if ($request->has('huisje') && is_array($request->input('huisje'))) {
            $data['huisje'] = implode(',', $request->input('huisje'));
        }

        // Ensure 'personen' saved as integer
        $data['personen'] = intval($request->input('personen'));

        Inschrijving::create($data);

        return redirect()->route('inschrijving.form')->with('success', 'Inschrijving succesvol opgeslagen.');
    }
}
