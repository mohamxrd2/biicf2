<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BicfAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et si son email est vérifié
        if (!auth()->check() || auth()->user()->email_verified_at === null) {
            return response()->json(['message' => 'Non authentifié ou email non vérifié.'], 401);
        }

        return $next($request);
    }
}
