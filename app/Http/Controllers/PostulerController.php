<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Postuler;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostulerController extends Controller
{
    public function index () {
        $postulerList = Postuler::all();
        return view('postuler.index', compact('postulerList'));
    }

    public function create()
    {
        $stagiaires = Stagiaire::all();
        $offres = Offre::all();

        return view('postuler.create', compact('stagiaires', 'offres'));
    }

    public function store(Request $request) {
        $champsValider = $request->validate([
            'etat' => 'required',
            'idO'=> 'required',
            'idSt' => 'required',
        ],[
            'etat.required' => 'Choisie une decision',
            'idO.required' => 'Choisie un offre',
            'idSt.required' => 'Choisie un stagiaire',
        ]);

        Postuler::create($champsValider);

        return redirect()->route('postuler.index');

    }

    public function edit(Postuler $postuler)
    {

        $stagiaires = Stagiaire::all();
        $offres = Offre::all();

        return view('postuler.edit', compact('postuler', 'stagiaires', 'offres'));
    }

    public function update(Request $request, Postuler $postuler){
        $champsValider = $request->validate([
            'etat' => 'required',
            'idO'=> 'required',
            'idSt' => 'required',
        ],[
            'etat.required' => 'Choisie une decision',
            'idO.required' => 'Choisie un offre',
            'idSt.required' => 'Choisie un stagiaire',
        ]);

        $postuler->update($champsValider);
        return redirect()->route('postuler.index');
    }

    public function destroy(Postuler $postuler) {
        $postuler->delete();
        return redirect()->route('postuler.index');
    }
}
