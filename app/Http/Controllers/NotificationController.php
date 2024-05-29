<?php

namespace App\Http\Controllers;

use App\Models\AchatDirect;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function index()
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Récupérer les notifications de l'utilisateur
        $notifications = $user->notifications;

        $unreadCount = $user->unreadNotifications->count();

        return view('biicf.notif', compact('notifications', 'unreadCount'));
    }
    public function show($id)
    {
        try {
            // Récupérer l'utilisateur authentifié
            $user = Auth::user();

            // Récupérer la notification
            $notification = DatabaseNotification::findOrFail($id);

            // Marquer la notification comme lue
            if ($notification->unread()) {
                $notification->markAsRead();
            }


            $isAccepted = AchatDirect::where('reponse', true)->exists();


            return view('biicf.notifshow', compact('notification', 'isAccepted'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la récupération de la notification: ' . $e->getMessage());
        }
    }
}
