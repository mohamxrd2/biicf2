<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    //
    public function index(){
        return view('admin.services');
    }
}
