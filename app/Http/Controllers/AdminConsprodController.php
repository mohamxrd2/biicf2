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

    public function destroyConsprod($id){
        $consommation = Consommation::find($id);

        if(!$consommation){
            return redirect()->back()->with('error', 'Consommation non trouvée.');
        }

        $consommation->delete();

        return redirect()->route('admin.conso-produit')->with('success', 'La consommation a été supprimée avec succès');
    }
}
