<?php

namespace App\Http\Controllers;

use App\Models\ProduitService;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    //
    public function index(){
        $services = ProduitService::where('type', 'services')->get();

        return view('admin.services', ['services' => $services]);
    }
}
