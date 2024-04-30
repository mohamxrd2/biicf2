<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWalletController extends Controller
{
    //
    public function index(){
        
        $adminId = Auth::guard('admin')->id();

        // Récupérer le portefeuille de l'administrateur connecté
        $adminWallet = Wallet::where('admin_id', $adminId)->first();

        return view('admin.wallet', compact('adminWallet'));
    }
}
