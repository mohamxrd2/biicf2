<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiicfAuthController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'], // Champ login pour prendre soit l'email soit le nom d'utilisateur
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember_me'); // Vérifie si "Remember Me" est coché

        // Ajouter une vérification pour trouver l'utilisateur par e-mail ou nom d'utilisateur
        $user = User::where('email', $credentials['login'])
            ->orWhere('username', $credentials['login'])
            ->first();

        if ($user && Auth::guard('web')->attempt(['email' => $user->email, 'password' => $credentials['password']], $remember)) {
            // Vérifier si l'email de l'utilisateur est vérifié
            if ($user->email_verified_at) {
                return redirect()->intended('/biicf/acceuil');
            } else {
                // Rediriger avec un message d'erreur si l'email n'est pas vérifié
                return back()->withErrors([
                    'error' => 'Veuillez vérifier votre adresse e-mail !',
                ])->withInput($request->only('login', 'remember_me'));
            }
        } else {
            return back()->withErrors([
                'error' => 'Identifiant ou mot de passe incorrect',
            ])->withInput($request->only('login', 'remember_me'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/biicf/login');
    }
}
