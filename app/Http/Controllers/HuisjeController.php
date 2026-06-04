<?php

namespace App\Http\Controllers;

use App\Models\Huisje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HuisjeController extends Controller
{
    /**
     * Toon een overzicht van alle huisjes.
     * Iedereen (ook niet-ingelogd) mag dit zien.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Haal alle huisjes op uit de database
        $huisjes = Huisje::all();

        return view('huisjes.index', compact('huisjes'));
    }

    /**
     * Toon het formulier om een nieuw huisje aan te maken.
     * Alleen beschikbaar voor admins.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Controleer of de ingelogde gebruiker een admin is
        if (auth()->check() && auth()->user()->rol === 'admin') {
            return view('huisjes.create');
        }

        // Geen admin → terugsturen naar huisjes overzicht
        return redirect()->route('huisjes.index')->with('error', 'Geen toegang.');
    }

    /**
     * Sla een nieuw huisje op in de database.
     * Alleen beschikbaar voor admins.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Alleen admins mogen dit doen
        if (!auth()->check() || auth()->user()->rol !== 'admin') {
            return redirect()->route('huisjes.index')->with('error', 'Geen toegang.');
        }

        // Valideer de invoer
        $validated = $request->validate([
            'naam'        => 'required|string|max:45',
            'locatie'     => 'nullable|string|max:45',
            'prijs'       => 'required|numeric|min:0',
            'periode'     => 'nullable|string|max:45',
            'beschrijving'=> 'nullable|string',
            'aantal'      => 'required|integer|min:1',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Verwerk de foto als die is geüpload
        if ($request->hasFile('foto')) {
            // Sla op in storage/app/public/huisjes
            $validated['foto'] = $request->file('foto')->store('huisjes', 'public');
        }

        // Maak het huisje aan in de database
        Huisje::create($validated);

        return redirect()->route('huisjes.index')->with('succes', 'Huisje succesvol toegevoegd!');
    }

    /**
     * Toon het formulier om een bestaand huisje te bewerken.
     * Alleen beschikbaar voor admins.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Alleen admins mogen dit doen
        if (!auth()->check() || auth()->user()->rol !== 'admin') {
            return redirect()->route('huisjes.index')->with('error', 'Geen toegang.');
        }

        // Haal het huisje op, geef 404 als niet gevonden
        $huisje = Huisje::findOrFail($id);

        return view('huisjes.edit', compact('huisje'));
    }

    /**
     * Sla de wijzigingen van een huisje op in de database.
     * Alleen beschikbaar voor admins.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Alleen admins mogen dit doen
        if (!auth()->check() || auth()->user()->rol !== 'admin') {
            return redirect()->route('huisjes.index')->with('error', 'Geen toegang.');
        }

        // Haal het huisje op
        $huisje = Huisje::findOrFail($id);

        // Valideer de invoer
        $validated = $request->validate([
            'naam'        => 'required|string|max:45',
            'locatie'     => 'nullable|string|max:45',
            'prijs'       => 'required|numeric|min:0',
            'periode'     => 'nullable|string|max:45',
            'beschrijving'=> 'nullable|string',
            'aantal'      => 'required|integer|min:1',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Verwerk nieuwe foto als die is geüpload
        if ($request->hasFile('foto')) {
            // Verwijder de oude foto als die bestaat
            if ($huisje->foto) {
                Storage::disk('public')->delete($huisje->foto);
            }
            $validated['foto'] = $request->file('foto')->store('huisjes', 'public');
        }

        // Werk het huisje bij
        $huisje->update($validated);

        return redirect()->route('huisjes.index')->with('succes', 'Huisje succesvol bijgewerkt!');
    }

    /**
     * Verwijder een huisje uit de database.
     * Alleen beschikbaar voor admins.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Alleen admins mogen dit doen
        if (!auth()->check() || auth()->user()->rol !== 'admin') {
            return redirect()->route('huisjes.index')->with('error', 'Geen toegang.');
        }

        // Haal het huisje op
        $huisje = Huisje::findOrFail($id);

        // Verwijder bijbehorende foto uit storage
        if ($huisje->foto) {
            Storage::disk('public')->delete($huisje->foto);
        }

        // Verwijder het huisje uit de database
        $huisje->delete();

        return redirect()->route('huisjes.index')->with('succes', 'Huisje succesvol verwijderd!');
    }
}
