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
}
