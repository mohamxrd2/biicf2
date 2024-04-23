<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    //
    public function index()
    {

        $users = User::with('admin')->paginate(2);

        return view('admin.client', compact('users'));
    }
    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}
