<?php

namespace App\Http\Controllers;

use App\Models\Litige;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class LitigeController extends Controller
{
    public function index()
    {
        $litiges = Litige::with(['createur', 'responsable'])->get();
        return view('litiges.index', compact('litiges'));
    }

    public function create()
    {
        $utilisateurs = Utilisateur::all();
        return view('litiges.create', compact('utilisateurs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:ouvert,en_cours,ferme',
            'attribue_a' => 'nullable|exists:utilisateurs,id',
            'cree_par' => 'required|exists:utilisateurs,id',
        ]);

        Litige::create($validated);

        return redirect()->route('litiges.index')->with('success', 'Litige créé avec succès.');
    }

    public function show(Litige $litige)
    {
        $litige->load(['createur', 'responsable', 'commentaires.utilisateur']);
        return view('litiges.show', compact('litige'));
    }

    public function edit(Litige $litige)
    {
        $utilisateurs = Utilisateur::all();
        return view('litiges.edit', compact('litige', 'utilisateurs'));
    }

    public function update(Request $request, Litige $litige)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:ouvert,en_cours,ferme',
            'attribue_a' => 'nullable|exists:utilisateurs,id',
        ]);

        $litige->update($validated);

        return redirect()->route('litiges.index')->with('success', 'Litige mis à jour avec succès.');
    }

    public function destroy(Litige $litige)
    {
        $litige->delete();
        return redirect()->route('litiges.index')->with('success', 'Litige supprimé avec succès.');
    }
}
