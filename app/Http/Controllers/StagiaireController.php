<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StagiaireController extends Controller
{
    public function index() {
        $stagiairesList = Stagiaire::all();
        return view('stagiaire.index', compact('stagiairesList'));
    }    


    public function create() {
        return view('stagiaire.create');
    }

    public function validerChampsPourAjouter(Request $request) {
        return $request->validate([
            'nom' => 'required|max:255|string',
            'prenom' => 'required|max:255|string',
            'email' => 'required|email|max:255|unique:stagiaires,email',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ], [
            'nom.required' => 'Nom est obligatoire',
            'prenom.required' => 'Prenom est obligatoire',
            'email.required' => 'Email est obligatoire',
            'email.email' => 'Email doit être une adresse email valide',
            'email.unique' => 'Cet email est déjà utilisé',
            'cv.required' => 'Le CV est obligatoire',
        ]);
    }

    public function validerChampsPourModifier(Request $request) {
        return $request->validate([
            'nom' => 'required|max:255|string',
            'prenom' => 'required|max:255|string',
            'email' => 'required|email|max:255',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ], [
            'nom.required' => 'Nom est obligatoire',
            'prenom.required' => 'Prenom est obligatoire',
            'email.required' => 'Email est obligatoire',
            'email.email' => 'Email doit être une adresse email valide',
            'email.unique' => 'Cet email est déjà utilisé',
        ]);
    }

    public function validerCv (Request $request){
        $file = $request->file('cv');
        $fileExtension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();

        if(!in_array($fileExtension, ['pdf', 'doc', 'docx']) || $fileSize > 5120000){
            return back()->withErrors(['status' => 'The file should be pdf, doc, or docx and should not be larger than 5MB']);
        }

        $folder = 'documents';
        $token = uniqid();
        $documentSrc = $folder.'/'.$token.'-'.$file->getClientOriginalName();
        $file->move($folder, $token . '-' . $file->getClientOriginalName());

        return $documentSrc;

    }

    public function store(Request $request) {
        $this->validerChampsPourAjouter($request);
        $cvSrc = $this->validerCv($request);

        $stagiaire = $request->post();
        $stagiaire['cv'] = $cvSrc;

        Stagiaire::create($stagiaire);

        return redirect()->route('stagiaire.index');

    }

    public function edit(Stagiaire $stagiaire) {
        return view('stagiaire.edit', compact('stagiaire'));
    }

    public function update(Request $request, Stagiaire $stagiaire) {
        $champsValider = $this->validerChampsPourModifier($request);

        if ($request->hasFile('cv')){
            $stagiaire->cv = $this->validerCv($request);
        }

        $stagiaire->nom = $champsValider['nom'];
        $stagiaire->prenom = $champsValider['prenom'];
        $stagiaire->email = $champsValider['email'];

        $stagiaire->save();
        return redirect()->route('stagiaire.index');

    }

    public function destroy (Stagiaire $stagiaire) {
        $stagiaire->delete();
        return redirect()->route('stagiaire.index');

    }
    
    public function offreList(Request $request) {
        $request->validate([
            'stagiaireOffres' => 'required|exists:stagiaires,idSt',
        ],[
            'stagiaireOffres.required' => "Selectionner un stagiaire"
        ]);
    
        $stagiaireId = $request->input('stagiaireOffres');
        $stagiaire = Stagiaire::find($stagiaireId);
        
        $offres = DB::select("
        SELECT o.*, e.nom as entreprise_nom, s.titre as specialite_titre
        FROM offres o
        JOIN postulers p ON o.idO = p.idO
        JOIN entreprises e ON o.idE = e.idE
        JOIN specialites s ON o.idSpe = s.idSpe
        WHERE p.idSt = :stagiaireId", ['stagiaireId' => $stagiaireId]);

    
        return view('stagiaire.offreList', compact('offres','stagiaire'));
    }

}
