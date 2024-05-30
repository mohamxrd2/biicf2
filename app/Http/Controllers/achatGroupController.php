<?php

namespace App\Http\Controllers;

use App\Models\AchatGrouper;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            // Récupérer l'utilisateur propriétaire du produit
           
            // Envoyer la notification au propriétaire du produit
           



            return redirect()->back()->with('success', 'Achat passé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
}
