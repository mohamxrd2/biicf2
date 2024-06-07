<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\AchatGrouper;
use App\Models\NotificationEd;
use App\Notifications\RefusAchat;
use App\Notifications\acceptAchat; // Assurez-vous que le nom est correctement capitalisé ici
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class achatGroupController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'nameProd' => 'required|string',
            'quantité' => 'required|integer',
            'montantTotal' => 'required|numeric',
            'localite' => 'required|string|max:255',
            'userTrader' => 'required|exists:users,id',
            'userSender' => 'required|exists:users,id',
            'specificite' => 'required|string',
            'photoProd' => 'required|string',
            'idProd' => 'required|exists:produit_services,id', // Correction ici, table correcte
        ]);

        // Récupérer l'utilisateur connecté
        $userId = Auth::id();

        // Vérifiez si l'utilisateur est authentifié
        if (!$userId) {
            return redirect()->back()->with('error', 'Utilisateur non authentifié.');
        }

        // Récupérer le portefeuille de l'utilisateur connecté
        $userWallet = Wallet::where('user_id', $userId)->first();

        // Vérifier si le portefeuille existe
        if (!$userWallet) {
            return redirect()->back()->with('error', 'Portefeuille introuvable.');
        }

        $requiredAmount = $validated['montantTotal'];

        // Vérifiez que le portefeuille de l'utilisateur a suffisamment de solde
        if ($userWallet->balance < $requiredAmount) {
            return redirect()->back()->with('error', 'Fonds insuffisants pour effectuer cet achat.');
        }

        try {
            // Créer une nouvelle achat
            $achat = AchatGrouper::create([
                'nameProd' => $validated['nameProd'],
                'quantité' => $validated['quantité'],
                'montantTotal' => $validated['montantTotal'],
                'localite' => $validated['localite'],
                'userTrader' => $validated['userTrader'],
                'userSender' => $validated['userSender'],
                'specificite' => $validated['specificite'],
                'photoProd' => $validated['photoProd'],
                'idProd' => $validated['idProd'],
            ]);

            // Déduire le montant du solde de l'utilisateur
            $userWallet->decrement('balance', $requiredAmount);

            // Enregistrer la transaction pour l'utilisateur connecté
            $transaction = new Transaction();
            $transaction->sender_user_id = $userId;
            $transaction->receiver_user_id = $validated['userTrader'];
            $transaction->type = 'Gele';
            $transaction->amount = $validated['montantTotal'];
            $transaction->save();


            return redirect()->back()->with('success', 'Achat passé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }

    public function accepter(Request $request)
    {
        // Déboguer les données reçues par la requête
       //dd($request->all());

        $userId = Auth::guard('web')->id();
        $userWallet = Wallet::where('user_id', $userId)->first();

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'userSender' => 'required|array',
            'userSender.*' => 'integer|exists:users,id',
            'montantTotal' => 'required|numeric',
            'message' => 'required|string',
            'notifId' => 'required|uuid|exists:notifications,id',
        ]);

        // Récupérer les données validées
        $userSenders = $validatedData['userSender'];
        $montantTotal = $validatedData['montantTotal'];
        $message = $validatedData['message'];
        $notifId = $validatedData['notifId'];

        // Trouver et mettre à jour la notification
        $notification = NotificationEd::find($notifId);
        if ($notification) {
            $notification->reponse = 'accepte';
            $notification->save();
        } else {
            return redirect()->back()->with('error', 'Notification non trouvée.');
        }

        // Calcul du pourcentage et du montant total
        $pourcentSomme = $montantTotal * 0.1;
        $totalSom = $montantTotal - $pourcentSomme;

        // Incrémenter le solde du portefeuille de userTrader
        $userWallet->increment('balance', $totalSom);

        // Créer une transaction de réception
        $this->createTransaction($userSenders[0], $userId, 'Reception', $totalSom);

        // Traitement pour le parrain du trader
        $userTrader = User::find($userId);
        if ($userTrader->parrain) {
            $commTraderParrain = $pourcentSomme * 0.05;
            $commTraderParrainWallet = Wallet::where('user_id', $userTrader->parrain)->first();
            $commTraderParrainWallet->increment('balance', $commTraderParrain);
            $this->createTransaction($userId, $userTrader->parrain, 'Commission', $commTraderParrain);
        }

        // Traitement pour chaque utilisateur ayant envoyé la demande
        foreach ($userSenders as $userSenderId) {
            $senderWallet = Wallet::where('user_id', $userSenderId)->first();

            if (!$senderWallet) {
                return redirect()->back()->with('error', 'Portefeuille pour l\'utilisateur ID ' . $userSenderId . ' introuvable.');
            }

            $senderWallet->increment('balance', $montantTotal);
            $this->createTransaction($userSenderId, $userId, 'Envoie', $montantTotal);

            $userSender = User::find($userSenderId);

            if (!$userSender) {
                return redirect()->back()->with('error', 'Utilisateur ID ' . $userSenderId . ' introuvable.');
            }

            if ($userSender->parrain) {
                $commSenderParrain = $pourcentSomme * 0.05;
                $commSenderParrainWallet = Wallet::where('user_id', $userSender->parrain->id)->first();
                
                if ($commSenderParrainWallet) {
                    $commSenderParrainWallet->increment('balance', $commSenderParrain);
                    $this->createTransaction($userSenderId, $userSender->parrain->id, 'Commission', $commSenderParrain);
                } else {
                    return redirect()->back()->with('error', 'Portefeuille du parrain pour l\'utilisateur ID ' . $userSender->parrain->id . ' introuvable.');
                }
            }

            Notification::send($userSender, new AcceptAchat($message));
        }

        return redirect()->back()->with('success', 'Action acceptée avec succès');
    }

    protected function createTransaction(int $senderId, int $receiverId, string $type, float $amount): void
    {
        $transaction = new Transaction();
        $transaction->sender_user_id = $senderId;
        $transaction->receiver_user_id = $receiverId;
        $transaction->type = $type;
        $transaction->amount = $amount;
        $transaction->save();
    }


    public function refuser(Request $request)
    {
        // Récupérer l'identifiant de l'utilisateur connecté
        $userId = Auth::guard('web')->id();

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'userSender' => 'required|array',
            'userSender.*' => 'integer|exists:users,id',
            'montantTotal' => 'required|numeric',
            'message' => 'required|string',
            'notifId' => 'required|integer|exists:notifications,id',
        ]);

        // Récupérer les données validées
        $userSenders = $validatedData['userSender'];
        $montantTotal = $validatedData['montantTotal'];
        $message = $validatedData['message'];
        $notifId = $validatedData['notifId'];

        // Trouver et mettre à jour la notification
        $notification = NotificationEd::find($notifId);
        if ($notification) {
            $notification->reponse = 'refuser';
            $notification->save();
        } else {
            return redirect()->back()->with('error', 'Notification non trouvée.');
        }

        // Traitement pour chaque utilisateur ayant envoyé la demande
        foreach ($userSenders as $userSenderId) {
            $userSenderWallet = Wallet::where('user_id', $userSenderId)->first();

            // Ajouter le montant au portefeuille de l'utilisateur
            if ($userSenderWallet) {
                $userSenderWallet->increment('balance', $montantTotal);

                // Créer une transaction
                $transaction = new Transaction();
                $transaction->sender_user_id = $userId;
                $transaction->receiver_user_id = $userSenderId;
                $transaction->type = 'Reception';
                $transaction->amount = $montantTotal;
                $transaction->save();

                // Envoyer une notification de refus
                $userSender = User::find($userSenderId);
                if ($userSender) {
                    Notification::send($userSender, new RefusAchat($message));
                }
            }
        }

        return redirect()->back()->with('success', 'Refus traité avec succès.');
    }
}
