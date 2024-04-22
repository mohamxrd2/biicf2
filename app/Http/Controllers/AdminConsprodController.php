<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use Illuminate\Http\Request;

class AdminConsprodController extends Controller
{
    //
    public function index()
    {
        $consprod = Consommation::where('type_prov', 'produits')->get();

        return view('admin.conso-produit', ['consprod' => $consprod]);

    }
}
