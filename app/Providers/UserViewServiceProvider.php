<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UserViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

        // Définir un View Composer pour les vues sous le préfixe 'biicf'
        View::composer('biicf.*', function ($view) {
            // Récupérer l'utilisateur authentifié
            $user = Auth::guard('web')->user();

            // Passer l'utilisateur aux vues
            $view->with('user', $user);
        });
    }
}
