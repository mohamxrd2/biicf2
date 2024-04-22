<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use Illuminate\Http\Request;

class AdminConsprodController extends Controller
{
    //
    public function index()
    {
        $consommations = Consommation::where('type', 'produits')->get();

        return view('admin.conso-produit', ['consommations' => $consommations]);

    }
}
