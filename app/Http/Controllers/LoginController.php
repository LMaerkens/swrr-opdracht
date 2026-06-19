<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(Request $request)
    {
        return view('inloggen');
    }

    /**
     * Handle authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validate credentials input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'E-mail is verplicht',
            'email.email' => 'Voer een geldig e-mailadres in',
            'password.required' => 'Wachtwoord is verplicht',
        ]);

        // Attempt login with remember parameter
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Regenerate session to protect against session fixation
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'U bent succesvol ingelogd.');
        }

        // Return back with input and errors
        return back()->withErrors([
            'email' => 'De ingevoerde e-mail of wachtwoord is onjuist.',
        ])->withInput($request->only('email'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'U bent succesvol uitgelogd.');
    }
}
