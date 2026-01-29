<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        // Récupérer l'utilisateur depuis la session
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // Récupérer les données complètes de l'utilisateur
        $user = DB::table('utilisateurs')->where('id', $userId)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Utilisateur non trouvé.');
        }

        // Données supplémentaires pour le profil
        $profileData = [
            'user' => $user,
            'lastLogin' => now()->format('d/m/Y H:i'), // À remplacer par une vraie logique si disponible
            'matricule' => $user->matricule ?? 'À définir',
            'grade' => $user->grade ?? 'À définir',
            'direction' => 'DRH & Formation des Cadres',
            'telephone_bureau' => $user->telephone_bureau ?? '',
            'bureau' => $user->bureau ?? '',
        ];

        return view('profile', $profileData);
    }

    public function showChangePassword()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        return view('profile.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = DB::table('utilisateurs')->where('id', $userId)->first();

        if (!Hash::check($request->current_password, $user->mot_de_passe)) {
            return back()->with('error', 'Le mot de passe actuel est incorrect.');
        }

        DB::table('utilisateurs')
            ->where('id', $userId)
            ->update([
                'mot_de_passe' => Hash::make($request->password),
                'modifie_le' => now(),
            ]);

        return redirect()->route('profile')->with('success', 'Mot de passe modifié avec succès.');
    }

    public function showTwoFactor()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = DB::table('utilisateurs')->where('id', $userId)->first();
        $twoFactorEnabled = $user->two_factor_enabled ?? false;

        return view('profile.two-factor', compact('twoFactorEnabled'));
    }

    public function toggleTwoFactor(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = DB::table('utilisateurs')->where('id', $userId)->first();
        $currentStatus = $user->two_factor_enabled ?? false;

        DB::table('utilisateurs')
            ->where('id', $userId)
            ->update([
                'two_factor_enabled' => !$currentStatus,
                'modifie_le' => now(),
            ]);

        $message = $currentStatus ? 'Double authentification désactivée.' : 'Double authentification activée.';
        return redirect()->route('profile.two-factor')->with('success', $message);
    }

    public function showConnectionHistory()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // Pour l'instant, on simule un historique de connexion
        // En production, vous auriez une table dédiée pour cela
        $connectionHistory = [
            ['date' => now()->format('d/m/Y H:i'), 'ip' => '192.168.1.100', 'device' => 'Chrome - Windows'],
            ['date' => now()->subDay()->format('d/m/Y H:i'), 'ip' => '192.168.1.100', 'device' => 'Chrome - Windows'],
            ['date' => now()->subDays(2)->format('d/m/Y H:i'), 'ip' => '192.168.1.100', 'device' => 'Safari - iPhone'],
        ];

        return view('profile.connection-history', compact('connectionHistory'));
    }
}
