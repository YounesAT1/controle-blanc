<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialiteController extends Controller
{
    public function index() {
        $specialiteList = Specialite::withCount('offres')->get();
        return view('specialite.index', compact('specialiteList'));
    }

    public function create() {
        return view('specialite.create');
    }

    public function store(Request $request) {
        $champsValider = $request->validate([
            'titre'=> 'required|max:255',
            'description'=> 'required|max:255',
        ],
        [
            'titre.required'=> 'Le titre est obligatoir',
            'description.required'=> 'La description est obligatoir',
        ]);

       
        Specialite::create($champsValider);
        return redirect()->route('specialite.index');
        
    }

    public function edit(Specialite $specialite) {
        return view('specialite.edit', compact('specialite'));
    }

    public function update(Request $request, Specialite $specialite) {
        $champsValider = $request->validate([
            'titre'=> 'required|max:255',
            'description'=> 'required|max:255',
        ],
        [
            'titre.required'=> 'Le titre est obligatoir',
            'description.required'=> 'La description est obligatoir',
        ]);

        $specialite->update($champsValider);
        return redirect()->route('specialite.index');
    }

    public function destroy(Specialite $specialite) {
        $specialite->delete();
        return redirect()->route('specialite.index');

    }

    public function offreList(Request $request) {
        $request->validate([
            'specialiteOffres' => 'required|exists:specialites,idSpe',
        ],[
            'specialiteOffres.required' => "Selectionner une specialite"
        ]);
    
        $specialiteId = $request->input('specialiteOffres');
    
        $specialite = Specialite::find($specialiteId);
        $offres = $specialite->offres; 
    
        return view('specialite.offreList', compact('offres','specialite'));
    }

    
}
