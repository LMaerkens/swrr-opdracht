<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inschrijving;
use App\Models\Huisje;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Toon het admin dashboard met overzichtsstatistieken.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $stats = [
            'inschrijvingen' => Inschrijving::count(),
            'huisjes'        => Huisje::count(),
            'users'          => User::count(),
            'admins'         => User::where('rol', 'admin')->count(),
        ];

        $recentInschrijvingen = Inschrijving::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInschrijvingen'));
    }

    /**
     * Toon alle inschrijvingen met sorteer- en zoekfunctie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function inschrijvingen(Request $request)
    {
        $sortField = $request->get('sort', 'created_at');
        $sortDir   = $request->get('dir', 'desc');
        $search    = $request->get('search', '');

        // Whitelist sorteerbare kolommen
        $allowedSorts = ['id', 'naam', 'email', 'personen', 'holiday', 'huisje', 'created_at'];
        if (!in_array($sortField, $allowedSorts)) {
            $sortField = 'created_at';
        }
        if (!in_array($sortDir, ['asc', 'desc'])) {
            $sortDir = 'desc';
        }

        $query = Inschrijving::query();

        // Zoeken op naam of email
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('naam', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $inschrijvingen = $query->orderBy($sortField, $sortDir)->paginate(20);

        return view('admin.inschrijvingen', compact(
            'inschrijvingen', 'sortField', 'sortDir', 'search'
        ));
    }

    /**
     * Toon de details van één inschrijving.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function inschrijvingShow($id)
    {
        $inschrijving = Inschrijving::findOrFail($id);
        return view('admin.inschrijving-show', compact('inschrijving'));
    }

    /**
     * Verwijder een inschrijving.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inschrijvingDestroy($id)
    {
        $inschrijving = Inschrijving::findOrFail($id);
        $inschrijving->delete();

        return redirect()->route('admin.inschrijvingen')
            ->with('success', 'Inschrijving van "' . $inschrijving->naam . '" is verwijderd.');
    }

    /**
     * Toon alle gebruikers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function users(Request $request)
    {
        $search = $request->get('search', '');

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.users', compact('users', 'search'));
    }

    /**
     * Wissel de admin-rol van een gebruiker.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userToggleAdmin($id)
    {
        $user = User::findOrFail($id);

        // Voorkom dat een admin zichzelf degradeert
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')
                ->with('error', 'Je kunt je eigen admin-rol niet wijzigen.');
        }

        $user->rol = $user->isAdmin() ? 'user' : 'admin';
        $user->save();

        $status = $user->isAdmin() ? 'admin gemaakt' : 'admin-rechten ingetrokken';

        return redirect()->route('admin.users')
            ->with('success', "{$user->name} is {$status}.");
    }
}
