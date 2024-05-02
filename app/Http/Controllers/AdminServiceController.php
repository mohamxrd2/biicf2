<?php

namespace App\Http\Controllers;

use App\Models\ProduitService;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    //
    public function index(){
       
        $services = ProduitService::with('user')
            ->where('type', 'services')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.services', ['services' => $services]);
    }

    public function destroyService($id){

        $services = ProduitService::find($id);

        if(!$services){
            return redirect()->back()->with('error', 'Service non trouvé.');
        }

        $services->delete();

        return redirect()->route('admin.services')->with('success', 'Le service a été supprimé avec succès');
    }
}
