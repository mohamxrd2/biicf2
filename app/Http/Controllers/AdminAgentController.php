<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAgentController extends Controller
{
    //


    // Contrôleur
    public function index()
    {
        $agents = Admin::where('admin_type', 'agent')->paginate(10);
        foreach ($agents as $agent) {
            // Récupérer le nombre d'utilisateurs associés à cet agent
            $userCount = $agent->users()->count();
            // Ajouter le nombre d'utilisateurs à l'agent
            $agent->userCount = $userCount;
        }
        return view('admin.agent', ['agents' => $agents]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|string|min:8',
            'repeat_password' => 'required|string|same:password',
            'phone' => 'required|string',
        ], [
            'username.unique' => 'Ce nom d\'utilisateur est déjà utilisé.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'repeat_password.same' => 'Les mots de passe ne correspondent pas.',
        ]);

        try {
            $admin = new Admin();
            $admin->name = $validatedData['name'] . ' ' . $validatedData['lastname'];
            $admin->username = $validatedData['username'];
            $admin->password = bcrypt($validatedData['password']);
            $admin->phonenumber = $validatedData['phone'];
            $admin->admin_type = 'agent';
            $admin->save();

            return redirect()->route('admin.agent')->with('success', 'Agent ajouté avec succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'enregistrement.'])->withInput();
        }
    }

    public function destroy($admin)
    {
        $admin = Admin::findOrFail($admin);
        $admin->delete();

        // Rediriger après la suppression
        return redirect()->route('admin.agent')->with('success', 'Agent supprimé avec succès.');
    }

    public function show($username)
    {
        // Récupérer les détails de l'agent en fonction de son username
        $agent = Admin::where('username', $username)->firstOrFail();
        
        $users = User::where('admin_id', $agent->id)->get();

        // Récupérer le nombre d'utilisateurs ayant le même admin_id que l'agent
        $userCount = User::where('admin_id', $agent->id)->count();
    
        // Passer les détails de l'agent et les utilisateurs à la vue
        return view('admin.agentShow', compact('agent', 'users', 'userCount'));
    }
}
