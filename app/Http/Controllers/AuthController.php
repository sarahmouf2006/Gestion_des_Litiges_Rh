<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // باش نستعمل الداتا بيز

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

    // هنا ديرها
    return redirect()->route('dashboard');
}

}
