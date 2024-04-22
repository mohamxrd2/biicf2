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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email|unique:users|max:255'

        ]);
    }


}
