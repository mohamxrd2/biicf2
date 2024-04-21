<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConsommationController extends Controller
{
    //
    public function index(){
        return view('admin.conso');
    }
}
