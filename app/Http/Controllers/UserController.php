<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Redirige a la vista de login si no se accede a través de POST
        if (!$request->isMethod('post')) {
            return view('login');
        }

        // Valida las credenciales
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('tasks');
        } else {
            return back()->withErrors(['email' => 'Las credenciales proporcionadas no son válidas.']);
        }
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
