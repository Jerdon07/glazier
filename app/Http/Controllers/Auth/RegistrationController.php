<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.register');
    }

    public function store(RegistrationRequest $request): RedirectResponse
    {
        $user = User::firstOrCreate([
            'email' => $request->email,
        ], [
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        
        return redirect()->route('home');
    }
}
