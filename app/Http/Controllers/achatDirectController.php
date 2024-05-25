<?php

namespace App\Http\Controllers;

use App\Models\AchatDirect;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\AchatBiicf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RefusAchat;


class AchatDirectController extends Controller
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
            'idProd' => 'required|exists:users,id',

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

        // Créer une nouvelle achat
        $achat = AchatDirect::create([
            'nameProd' => $validated['nameProd'],
            'quantité' => $validated['quantité'],
            'montantTotal' => $validated['montantTotal'],
            'localite' => $validated['localite'],
            'userTrader' => $validated['userTrader'],
            'userSender' => $validated['userSender'],
            'specificite' => $validated['specificite'], // Ajout de la validation pour specificite
            'photoProd' => $validated['photoProd'], // Ajout de la validation pour specificite
            'idProd' => $validated['idProd'], // Ajout de la validation pour specificite
        ]);

        // Déduire le montant du solde de l'utilisateur
        $userWallet->decrement('balance', $requiredAmount);

        // Enregistrer la transaction pour l'utilisateur connecté
        $transaction = new Transaction();
        $transaction->sender_user_id = $userId;
        $transaction->receiver_user_id = $validated['userTrader'];
        $transaction->type = 'Envoie';
        $transaction->amount = $validated['montantTotal'];
        $transaction->save();

        // Récupérer l'utilisateur propriétaire du produit
        $owner = User::find($validated['userTrader']);

        // Envoyer la notification au propriétaire du produit
        Notification::send($owner, new AchatBiicf($achat));

        return redirect()->back()->with('success', 'Achat passé avec succès.');
    }
    public function accepter(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $userId = Auth::guard('web')->id();

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

        // Valider les données
        $validated = $request->validate([
            'montantTotal' => 'required|numeric|min:1',
            'userSender' => 'required|integer|exists:users,id',
        ]);

        $userSender = $validated['userSender'];
        $requiredAmount = $validated['montantTotal'];

        // Incrémenter le solde du portefeuille
        $userWallet->increment('balance', $requiredAmount);

        // Enregistrer la transaction pour l'utilisateur connecté
        $transaction = new Transaction();
        $transaction->sender_user_id = $userSender;
        $transaction->receiver_user_id = $userId;
        $transaction->type = 'Reception';
        $transaction->amount = $requiredAmount;
        $transaction->save();

        return redirect()->back()->with('success', 'Achat accepté.');
    }

    public function refuser(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $userId = Auth::guard('web')->id();

        // Vérifier si l'utilisateur est authentifié
        if (!$userId) {
            return redirect()->back()->with('error', 'Utilisateur non authentifié.');
        }

        // Valider les données
        $validated = $request->validate([
            'montantTotal' => 'required|numeric|min:1',
            'userSender' => 'required|integer|exists:users,id',
            'message' => 'required|string',
        ]);

        $userSender = $validated['userSender'];
        $requiredAmount = $validated['montantTotal'];

        // Récupérer le portefeuille de l'utilisateur de la notification
        $userWallet = Wallet::where('user_id', $userSender)->first();

        // Vérifier si le portefeuille existe
        if (!$userWallet) {
            return redirect()->back()->with('error', 'Portefeuille introuvable.');
        }

        // Vérifiez que le portefeuille de l'utilisateur a suffisamment de solde
        if ($userWallet->balance >= $requiredAmount) {

            // Décrémenter le solde du portefeuille
            $userWallet->increment('balance', $requiredAmount);

            // Enregistrer la transaction pour l'utilisateur connecté
            $transaction = new Transaction();
            $transaction->sender_user_id = $userId;
            $transaction->receiver_user_id = $userSender;
            $transaction->type = 'Reception';
            $transaction->amount = $requiredAmount;
            $transaction->save();

            // Récupérer l'utilisateur qui a envoyé l'achat
            $userSender = User::find($validated['userSender']);

            // Envoyer la notification au propriétaire du produit
            Notification::send($userSender, new refusAchat($validated['message']));

            return redirect()->back()->with('success', 'Achat refusé.');
        } else {
            return redirect()->back()->with('error', 'Solde insuffisant pour refuser cet achat.');
        }
    }
}
