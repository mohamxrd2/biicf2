<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Admin::where('admin_type', 'agent')->get();
        foreach ($agents as $agent) {
            // Récupérer le nombre d'utilisateurs associés à cet agent
            $userCount = $agent->users()->count();
            // Ajouter le nombre d'utilisateurs à l'agent
            $agent->userCount = $userCount;
        }
        return view('admin.agent', ['agents' => $agents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $admin)
    {
        // Trouvez l'agent à supprimer par son ID
        $admin = Admin::findOrFail($admin);

        // Supprimez l'agent
        $admin->delete();

        // Redirigez vers la liste des agents avec un message de succès
        return to_route('admin.index')->with('success', 'L\'agent a été supprimé avec succès.');
    }

    public function updateProfilePhoto(Request $request)
{
    // Récupère l'administrateur actuellement connecté
    
}

}
