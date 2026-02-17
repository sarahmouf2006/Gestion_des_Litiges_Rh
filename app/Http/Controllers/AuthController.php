<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // To use the DB

class AuthController extends Controller
{
 public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'mot_de_passe' => 'required',
    ]);

    $user = DB::table('utilisateurs')->where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Utilisateur non trouvé.');
    }

    if (!Hash::check($request->mot_de_passe, $user->mot_de_passe)) {
        return back()->with('error', 'Mot de passe incorrect.');
    }

    session([
        'user_id' => $user->id,
        'user_nom' => $user->nom
    ]);

    
    return redirect()->route('dashboard');
}

public function register(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:utilisateurs,email',
        'mot_de_passe' => 'required|string|min:6|confirmed',
    ], [
        'nom.required' => 'Le nom est obligatoire.',
        'email.required' => 'L\'email est obligatoire.',
        'email.email' => 'L\'email doit être valide.',
        'email.unique' => 'Cet email est déjà utilisé.',
        'mot_de_passe.required' => 'Le mot de passe est obligatoire.',
        'mot_de_passe.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        'mot_de_passe.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
    ]);

    $userId = DB::table('utilisateurs')->insertGetId([
        'nom' => $request->nom,
        'email' => $request->email,
        'mot_de_passe' => Hash::make($request->mot_de_passe),
        'role' => 'utilisateur', // Valeur par défaut
        'cree_le' => now(),
        'modifie_le' => now(),
    ]);

    // Automatically log in the user after registration
    $user = DB::table('utilisateurs')->where('id', $userId)->first();
    session([
        'user_id' => $user->id,
        'user_nom' => $user->nom
    ]);

    return redirect()->route('dashboard')->with('success', 'Compte créé avec succès. Vous êtes maintenant connecté.');
}

public function logout(Request $request)
{
    // Clear all session data
    session()->flush();
    
    // Invalidate the session
    $request->session()->invalidate();
    
    // Regenerate CSRF token
    $request->session()->regenerateToken();
    
    return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès.');
}

}
