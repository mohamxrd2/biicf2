<?php

namespace App\Http\Controllers\biicf;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        return view('auth.signup');
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'repeat-password' => 'required|string|same:password',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'local' => 'required',
            'adress_geo' => 'required',
            'proximity' => 'required',
        ], [
            'email.unique' => 'Email deja utlisé',
            'name.required' => 'Le champ nom est requis.',
            'username.required' => 'Le champ nom d\'utilisateur est requis.',
            'username.unique' => 'Ce nom d\'utilisateur est déjà utilisé.',
            'password.required' => 'Le champ mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'repeat-password.required' => 'Le champ confirmation du mot de passe est requis.',
            'repeat-password.same' => 'Les mots de passe ne correspondent pas.',
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'L\'adresse email doit être valide.',
            'phone.required' => 'Le champ téléphone est requis.',
            'local.required' => 'Le champ localité est requis.',
            'adress_geo.required' => 'Le champ adresse géographique est requis.',
            'proximity.required' => 'Le champ zone d\'activité est requis.',
        ]);

        try {
            $user = new User();
            $user->name = $validatedData['name'] . ' ' . $request->input('last-name');
            $user->username = $validatedData['username'];
            $user->password = Hash::make($validatedData['password']);
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->local_area = $validatedData['local'];
            $user->address = $validatedData['adress_geo'];
            $user->active_zone = $validatedData['proximity'];
            $user->actor_type = $request->input('user_type');
            $user->gender = $request->input('user_sexe');
            $user->age = $request->input('user_age');
            $user->social_status = $request->input('user_status');
            $user->company_size = $request->input('user_comp_size');
            $user->service_type = $request->input('user_serv');
            $user->organization_type = $request->input('user_orgtyp');
            $user->second_organization_type = $request->input('user_orgtyp2');
            $user->communication_type = $request->input('user_com');
            $user->mena_type = $request->input('user_mena1');
            $user->mena_status = $request->input('user_mena2');
            $user->sector = $request->input('sector_activity');
            $user->industry = $request->input('industry');
            $user->construction = $request->input('building_type');
            $user->commerce = $request->input('commerce_sector');
            $user->services = $request->input('transport_sector');
            $user->country = $request->input('country');



            $user->save();

            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->balance = 0; // Solde initial
            $wallet->save();

            //envoi du couriel au nouveau client
            $user->sendEmailVerificationNotification();

            return redirect()->route('biicf.login')->with('success', 'Client ajouté avec succès, veillez confirmer votre email!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'enregistrement.'])->withInput();
        }
    }

    
}
