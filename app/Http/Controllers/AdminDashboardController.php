<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProduitService;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        // Nombre total de clients
        $totalClients = User::count();

        // Nombre total de produits et de services
        $totalProducts = ProduitService::where('type', 'produits')->count();
        $totalServices = ProduitService::where('type', 'services')->count();

        // Liste des 5 derniers utilisateurs
        $users = User::orderBy('created_at', 'desc')->take(5)->get();

        // Portefeuille de l'administrateur
        $adminId = Auth::guard('admin')->id();
        $adminWallet = Wallet::where('admin_id', $adminId)->first();

        // Nombre total d'utilisateurs ayant le même admin_id que l'agent
        $userCount = User::where('admin_id', $adminId)->count();

        return view('admin.dashboard', [
            'totalClients' => $totalClients,
            'totalProducts' => $totalProducts,
            'totalServices' => $totalServices,
            'users' => $users,
            'adminWallet' => $adminWallet,
            'userCount' => $userCount,
        ]);
    }
}
