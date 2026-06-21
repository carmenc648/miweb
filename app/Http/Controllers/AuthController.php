<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credenciales)) {

            $request->session()->regenerate();

            $rol = strtolower(trim(Auth::user()->rol));

            if ($rol === 'admin') {
                return redirect('/panel');
            }

            if ($rol === 'programador') {
                return redirect('/soporte');
            }

            if ($rol === 'empleado') {
                return redirect('/menu-empleado');
            }

            Auth::logout();

            return redirect('/login')->withErrors([
                'email' => 'Rol no autorizado'
            ]);
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}