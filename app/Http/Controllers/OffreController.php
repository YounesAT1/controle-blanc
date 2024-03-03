<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Offre;
use App\Models\Specialite;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function index() {
        $offresList = Offre::all();
        return view('offre.index', compact('offresList'));
    }

    public function create() {
        $entrepriseList = Entreprise::all();
        $sspecialiteList = Specialite::all();
        return view('offre.create', compact('entrepriseList', 'sspecialiteList'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'salaire' => 'required|numeric',
            'idE' => 'required|exists:entreprises,idE',
            'idSpe' => 'required|exists:specialites,idSpe',
        ]);

        Offre::create([
            'titre' => $validatedData['titre'],
            'salaire' => $validatedData['salaire'],
            'idE' => $validatedData['idE'],
            'idSpe' => $validatedData['idSpe'],
        ]);
        
        return redirect()->route('offre.index');
    }

    public function edit(Offre $offre)
    {
        $entrepriseList = Entreprise::all();
        $sspecialiteList = Specialite::all();

        return view('offre.edit', compact('offre', 'entrepriseList', 'sspecialiteList'));
    }

    public function update(Request $request, Offre $offre)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'salaire' => 'required|numeric',
            'idE' => 'required|exists:entreprises,idE',
            'idSpe' => 'required|exists:specialites,idSpe',
        ]);

        $offre->update($validatedData);

        return redirect()->route('offre.index');
    }



    public function destroy (Offre $offre) {
        $offre->delete();
        return redirect()->route('offre.index');

    }
}
