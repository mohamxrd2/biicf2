<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProduitService;

class AdminDashboardController extends Controller
{
    //
    public function index(){

        $totalClients = User::count();
        $totalProducts = ProduitService::where('type', 'produits')->count();
        $totalServices = ProduitService::where('type', 'services')->count();
        $users = User::orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.dashboard', [
            'totalClients' => $totalClients,
            'totalProducts' => $totalProducts,
            'totalServices' => $totalServices,
            'users' => $users,
        ]);
    }
}
