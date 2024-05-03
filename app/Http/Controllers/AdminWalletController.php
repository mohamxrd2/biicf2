<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWalletController extends Controller
{
    //
    public function index()
{
    $adminId = Auth::guard('admin')->id();

    // Récupérer le portefeuille de l'administrateur connecté
    $adminWallet = Wallet::where('admin_id', $adminId)->first();

    $transactions = Transaction::with(['senderAdmin', 'receiverAdmin', 'senderUser', 'receiverUser'])
        ->where('sender_admin_id', $adminId)
        ->orWhere('receiver_admin_id', $adminId)
        ->orderBy('created_at', 'DESC')
        ->get();

    $transacCount = $transactions->count();

    // Récupérer les 5 derniers agents
    $agents = Admin::where('admin_type', 'agent')
        ->orderBy('created_at', 'DESC')
        ->get();

    $agentCount = $agents->count();

    // Récupérer les 5 derniers utilisateurs
    $users = User::with('admin')
        ->orderBy('created_at', 'DESC')
        ->get();

    $userCount = $users->count();

    return view('admin.wallet', compact('adminWallet', 'transactions', 'transacCount', 'agents', 'users', 'agentCount', 'userCount'));
}




    public function deposit(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Récupérer l'ID de l'administrateur connecté
        $adminId = Auth::guard('admin')->id();

        // Créer une nouvelle transaction
        $transaction = new Transaction();
        $transaction->receiver_admin_id = $adminId;
        $transaction->type = 'Depot';
        $transaction->amount = $request->amount;
        $transaction->save();

        // Mettre à jour le solde du portefeuille de l'administrateur
        $adminWallet = Wallet::where('admin_id', $adminId)->first();
        $adminWallet->increment('balance', $request->amount);

        // Rediriger avec un message de succès
        return back()->with('success', 'Dépôt effectué avec succès.');
    }
}
