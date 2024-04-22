<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    //
    public function index(){
        
        $users = User::with('admin')->get();

        return view('admin.client', compact('users'));
    }
}
