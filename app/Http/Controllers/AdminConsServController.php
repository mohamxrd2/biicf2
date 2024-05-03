<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use Illuminate\Http\Request;

class AdminConsServController extends Controller
{
    //
    public function index(){
        $consommations = Consommation::where('type', 'services')->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.conso-service', ['consommations' => $consommations]);
    }
    public function destroyConsserv($id){
        $consommation = Consommation::find($id);

        if(!$consommation){
            return redirect()->back()->with('error', 'Consommation non trouvée.');
        }

        $consommation->delete();

        return redirect()->route('admin.conso-service')->with('success', 'La consommation a été supprimée avec succès');
    }

}
