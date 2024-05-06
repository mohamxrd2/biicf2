<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BicfAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.signinB');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember_me'); // Vérifie si "Remember Me" est coché

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return back()->withErrors([
                'username' => 'Identifiant ou mot de passe incorrect',
            ])->withInput($request->only('username', 'remember_me'));
        }
    }




}
