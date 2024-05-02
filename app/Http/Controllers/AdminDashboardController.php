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
        //Admin//////

        // Nombre total de clients
        $totalClients = User::count();

        // Nombre total de produits et de services
        $totalProducts = ProduitService::where('type', 'produits')->count();
        $totalServices = ProduitService::where('type', 'services')->count();

        // Liste des 5 derniers utilisateurs
        $users = User::orderBy('created_at', 'desc')->take(5)->get();

        //Agent//////

        //  l'agent connecté
        $adminId = Auth::guard('admin')->id();
        // Portefeuille de l'agent
        $adminWallet = Wallet::where('admin_id', $adminId)->first();
        // Récupérer les utilisateurs ayant le même admin_id que l'agent
        $usersWithSameAdminId = User::where('admin_id', $adminId)->get();
        // Nombre total d'utilisateurs ayant le même admin_id que l'agent
        $userCount = User::where('admin_id', $adminId)->count();
        // Nombre total d'utilisateurs ayant le même admin_id que l'agent
        // $ServicesUserCount = ProduitService::where('admin_id', $adminId)->count();

        return view('admin.dashboard', [
            'totalClients' => $totalClients,
            'totalProducts' => $totalProducts,
            'totalServices' => $totalServices,
            'users' => $users,
            'adminWallet' => $adminWallet,
            'userCount' => $userCount,
            'usersWithSameAdminId' => $usersWithSameAdminId,
            // 'ServicesUserCount' => $ServicesUserCount,
        ]);
    }
}
