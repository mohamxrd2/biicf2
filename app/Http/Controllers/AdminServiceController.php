<?php

namespace App\Http\Controllers;

use App\Models\ProduitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminServiceController extends Controller
{
    //
    public function index()
    {

        $services = ProduitService::with('user')
            ->where('type', 'services')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        //Agent//////

        //  l'agent connecté
        $adminId = Auth::guard('admin')->id();
        // affiche dans la table produits_service ayant le même admin_id pour le type de service
        $serviceAgents = ProduitService::with('user')
            ->whereHas('user', function ($query) use ($adminId) {
                $query->where('admin_id', $adminId);
            })
            ->where('type', 'services')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.services', [
            'services' => $services,
            'adminId' => $adminId,
            'serviceAgents' => $serviceAgents,
        ]);
    }

    public function destroyService($id)
    {

        $services = ProduitService::find($id);

        if (!$services) {
            return redirect()->back()->with('error', 'Service non trouvé.');
        }

        $services->delete();

        return redirect()->route('admin.services')->with('success', 'Le service a été supprimé avec succès');
    }
}
