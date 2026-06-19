<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Controleer of de ingelogde gebruiker een admin is.
     * Zo niet, stuur terug naar de homepagina met een foutmelding.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Je hebt geen toegang tot het admin paneel.');
        }

        return $next($request);
    }
}
