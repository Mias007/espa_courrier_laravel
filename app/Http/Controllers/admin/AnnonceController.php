<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Annonces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    public function index()
    {
        $Annonces = Annonces::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.index', compact('Annonces'));
    }

    public function create()
    {
        return view('admin.Annonces_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'annonce' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Gérer le téléchargement d'image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        Annonces::create($validated);

        return redirect()->route('Annonces.Annonces.index')->with('success', 'Annonce ajoutée avec succès.');
    }

    public function show(Annonces $annonce)
    {
        return view('Annonces.Annonces.show', compact('annonce'));
    }

    public function edit($id)
    {
        $annonce = Annonces::findOrFail($id);
        return view('admin.Annonces_edit', compact('annonce'));
    }

    public function update(Request $request, $id)
    {
        $annonce = Annonces::findOrFail($id);

        // Valider les données entrantes
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'annonce' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Modifier selon les besoins
        ]);

        // Mettre à jour les champs de l'annonce
        $annonce->titre = $validatedData['titre'];
        $annonce->annonce = $validatedData['annonce'];

        // Vérifier et gérer l'image téléchargée
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('annonces', 'public');
            $annonce->image = $imagePath;
        }

        // Enregistrer les modifications
        $annonce->save();

        return redirect()->route('Annonces.Annonces.index')->with('success', 'Annonce mise à jour avec succès.');
    }


    public function destroy($id)
    { $annonces = Annonces::findOrFail($id);
        if ($annonces->file_path) {
            Storage::delete($annonces->file_path);
        }
        $annonces->delete();
        return redirect()->route('Annonces.Annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}
