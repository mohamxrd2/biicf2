<?php

namespace App\Http\Controllers;

use App\Models\ProduitService;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    //
    public function index(){
        $produits = ProduitService::where('type', 'produits')->get();
        
        return view('admin.products', ['produits' => $produits]);
    }

    public function destroyProduct($id)
    {
        $produit = ProduitService::find($id);

        if (!$produit) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $produit->delete();

        return redirect()->back()->with('success', 'Produit supprimé avec succès.');
    }
}
