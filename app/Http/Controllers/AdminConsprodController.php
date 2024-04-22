<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConsprodController extends Controller
{
    //
    public function index()
    {
        return view('admin.conso-produit');
    }
}
