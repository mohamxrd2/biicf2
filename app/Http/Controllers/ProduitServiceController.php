<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProduitService;
use App\Http\Controllers\Controller;
use App\Models\AchatGrouper;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Import de la classe Carbon

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

    public function postBiicf()
    {
        // Récupérer l'utilisateur connecté via le gardien web
        $user = Auth::guard('web')->user();

        // Vérifier si l'utilisateur est authentifié
        if ($user) {
            // Récupérer les produits associés à cet utilisateur
            $produits = ProduitService::where('user_id', $user->id)->orderBy('created_at', 'desc')
                ->paginate(10);


            // Compter le nombre de produits
            $prodCount = $produits->count();

            // Passer les produits à la vue
            return view('biicf.post', ['produits' => $produits, 'prodCount' => $prodCount]);
        } else {
            // Rediriger l'utilisateur vers la page de connexion s'il n'est pas authentifié
            return redirect()->route('login');
        }
    }

    public function homeBiicf()
    {

        $produits = ProduitService::with('user')
            ->where('statuts', 'Accepté')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $users = User::orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('biicf.acceuil', compact('users', 'produits',));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $zoneEconomique = $request->input('zone_economique');
        $type = $request->input('type');

        // Faire la recherche dans la base de données en fonction des filtres
        $produits = ProduitService::with('user')
            ->where('statuts', 'Accepté')
            ->orderBy('created_at', 'desc');


        if ($keyword) {
            $produits->where('name', 'like', '%' . $keyword . '%');
        }

        if ($zoneEconomique) {
            $produits->where('zonecoServ', $zoneEconomique);
        }

        if ($type) {
            $produits->where('type', $type);
        }

        $results = $produits->paginate(10);

        $resultCount = $results->total();

        $produitDims = ProduitService::with('user')
            ->where('statuts', 'Accepté')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('biicf.search', compact('results', 'produits', 'resultCount', 'produitDims'));
    }
    public function pubDet($id)
    {
        $produit = ProduitService::find($id);

        $userId = Auth::guard('web')->id();

        $userWallet = Wallet::where('user_id', $userId)->first();

        // Récupérer le nbr d'achat grouper sur un seul produit
        $nbreAchatGroup = AchatGrouper::where('idProd', $produit->id)
        ->distinct('userSender') // Sélectionner uniquement les utilisateurs distincts
        ->count();


        // Récupérer la date la plus ancienne
        $datePlusAncienne = AchatGrouper::where('idProd', $id)->min('created_at');

        // Ajouter 5 jours à la date la plus ancienne
        $tempEcoule = Carbon::parse($datePlusAncienne)->addDays(5);

        // Récupérer tous les userSender liés à ce idProd dans AchatGrouper
        $idSenders = AchatGrouper::where('idProd', $produit->id)->pluck('userSender');

        // Récupérer les utilisateurs correspondant aux idSender
        $users = User::whereIn('id', $idSenders)->get();


        if (Carbon::now()->greaterThan($tempEcoule)) {
            // Insérer des données dans AchatGrouper
            
        }

        return view('biicf.postdetail', compact('produit', 'userWallet', 'userId', 'id', 'nbreAchatGroup', 'idSenders', 'users', 'datePlusAncienne', 'tempEcoule'));
    }
}
