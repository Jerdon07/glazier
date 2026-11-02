<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        if (! Auth::attempt($validated)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ]);
        };

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
