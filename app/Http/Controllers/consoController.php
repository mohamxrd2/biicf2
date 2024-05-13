<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class consoController extends Controller
{
    //

    public function adminConsProd()
    {
        $consommations = Consommation::where('type', 'produits')->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.conso-produit', ['consommations' => $consommations]);

    }

    public function destroyConsprod($id){
        $consommation = Consommation::find($id);

        if(!$consommation){
            return redirect()->back()->with('error', 'Consommation non trouvée.');
        }

        $consommation->delete();

        return back()->with('success', 'La consommation a été supprimée avec succès');
    }
    public function adminConsServ(){
        $consommations = Consommation::where('type', 'services')->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.conso-service', ['consommations' => $consommations]);
    }
    public function destroyConsserv($id){
        $consommation = Consommation::find($id);

        if(!$consommation){
            return redirect()->back()->with('error', 'Consommation non trouvée.');
        }

        $consommation->delete();

        return back()->with('success', 'La consommation a été supprimée avec succès');
    }
}
