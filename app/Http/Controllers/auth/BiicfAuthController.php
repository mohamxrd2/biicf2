<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiicfAuthController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
