<?php

namespace App\Http\Controllers;

use App\Models\ProduitService;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    //
    public function index(){
        $produits = ProduitService::where('type', 'produits')->get();
        // foreach ($agents as $agent) {
        //     // Récupérer le nombre d'utilisateurs associés à cet agent
        //     $userCount = $agent->users()->count();
        //     // Ajouter le nombre d'utilisateurs à l'agent
        //     $agent->userCount = $userCount;
        // }
        return view('admin.products', ['produits' => $produits]);
    }
}
