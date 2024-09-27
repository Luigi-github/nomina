<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
/*        // Validación de los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);*/

        // Intentar autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'))) {
            // Autenticación exitosa, redirigir a la vista de empleados
            return redirect()->route('empleados.index')->with('success', 'Has iniciado sesión correctamente.');
        }

        // Si las credenciales son incorrectas, redirigir con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión.');
    }
}
