<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProduitService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProduitServiceController extends Controller
{
    //
    public function adminProduct()
    {
        $produits = ProduitService::with('user')
            ->where('type', 'produits')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        //Agent/////

        $prodCount = $produits->count();

        //  l'agent connecté
        $adminId = Auth::guard('admin')->id();
        // Récupérer les produits avec l'utilisateur associé ayant le même admin_id
        $produitAgents = ProduitService::with('user')
            ->whereHas('user', function ($query) use ($adminId) {
                $query->where('admin_id', $adminId);
            })
            ->where('type', 'produits')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // Compter le nombre de produits qui correspondent aux critères spécifiés
        $produitAgentsCount = ProduitService::with('user')
            ->whereHas('user', function ($query) use ($adminId) {
                $query->where('admin_id', $adminId);
            })
            ->where('type', 'produits')
            ->count();
        return view('admin.products', [
            'produits' => $produits,
            'adminId' => $adminId,
            'produitAgents' => $produitAgents,
            'produitAgentsCount' => $produitAgentsCount,
            'prodCount' => $prodCount

        ]);
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
    public function adminService()
    {

        $services = ProduitService::with('user')
            ->where('type', 'services')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        //Agent//////

        $servieCount = $services->count();

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
        $serviceAgentsCount = ProduitService::with('user')
            ->whereHas('user', function ($query) use ($adminId) {
                $query->where('admin_id', $adminId);
            })
            ->where('type', 'services')
            ->count();

        return view('admin.services', [
            'services' => $services,
            'adminId' => $adminId,
            'serviceAgents' => $serviceAgents,
            'serviceAgentsCount' => $serviceAgentsCount,
            'servieCount' => $servieCount
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
