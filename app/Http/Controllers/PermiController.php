<?php

namespace App\Http\Controllers;

use App\Models\Permis;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermiController extends Controller
{
    public function afficherList()
    {
        $permisList = Permis::all();
        return view('permi.index', compact('permisList'));
    }

    public function afficherForm () {
        $chauffeurs = Chauffeur::all();
        return view('permi.create', compact('chauffeurs'));
    }

    public function ajouter(Request $request)
    {

        $validatedData = $request->validate([
            'numero' => 'required|numeric',
            'type' => 'required|string|max:255',
            'dateExpiration' => 'required|date',
            'id' => 'required|exists:chauffeurs,id',
        ],
        [
            'numero.required' => 'Le numéro est obligatoire',
            'type.required' => 'Le type est obligatoire',
            'dateExpiration.required' => 'La date  est obligatoire',
            'id.required' => 'Le chauffeur est obligatoire',
        ]);


        Permis::create($validatedData);

        return redirect()->route('permis.index');
    }

    public function modifier(Permis $permis)
    {
        $chauffeurs = Chauffeur::all();
        return view('permi.edit', compact('permis', 'chauffeurs'));
    }

    public function mettreAjour(Request $request, Permis $permis)
    {
        $validatedData = $request->validate([
            'numero' => 'required|numeric',
            'type' => 'required|string|max:255',
            'dateExpiration' => 'required|date',
            'id' => 'required|exists:chauffeurs,id',
        ]);
        
        

        $permis->update($validatedData);

        return redirect()->route('permis.index');
    }

    public function supprimer(Permis $permis)
    {
        $permis->delete();

        return redirect()->route('permis.index');
    }
}
