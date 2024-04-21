<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddClientController extends Controller
{
    //

    public function create()
    {
        return view('admin.addclient');
    }


}
