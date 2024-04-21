<?php
// app/Http/Middleware/AdminAuthMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié en tant qu'administrateur
        if (!Auth::guard('admin')->check()) {
            // Utilisateur non authentifié en tant qu'administrateur, rediriger vers la page de connexion
            return redirect()->route('admin.login'); // Adapter la route de redirection selon votre configuration
        }

        // L'utilisateur est authentifié en tant qu'administrateur, autoriser l'accès à la route
        return $next($request);
    }
}

