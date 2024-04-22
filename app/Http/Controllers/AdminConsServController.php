<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use Illuminate\Http\Request;

class AdminConsServController extends Controller
{
    //
    public function index(){
        $consommations = Consommation::where('type', 'services')->get();

        return view('admin.conso-service', ['consommations' => $consommations]);
    }
}
