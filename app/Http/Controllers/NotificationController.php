<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function show($id)
    {
        try {
            // Récupérer l'utilisateur authentifié
            $user = Auth::guard('web')->user();
            
            // Récupérer la notification
            $notification = $user->notifications()->findOrFail($id);

            // Marquer la notification comme lue
            if ($notification->unread()) {
                $notification->markAsRead();
            }

            return view('biicf.notifshow', compact('notification'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la récupération de la notification: ' . $e->getMessage());
        }
    }
}
