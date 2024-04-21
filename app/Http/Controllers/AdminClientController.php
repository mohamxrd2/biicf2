<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    //
    public function index(){
        return view('admin.client');
    }
}
