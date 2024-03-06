<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Livraison;

class ChauffeurController extends Controller
{
    public function afficherList()
    {
        $chauffeurList = Chauffeur::withCount('livraisons')->get();
    
        return view('chauffeur.index', compact('chauffeurList'));
    }    

    public function ajouter(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ],
        [
            'nom' => 'Le nom est obligatoir',
            'prenom' => 'Le prenom est obligatoir',
        ]);

        Chauffeur::create($validatedData);

        return redirect()->route('chauffeur.index');
    }

    public function modifier(Chauffeur $chauffeur)
    {
        return view('chauffeur.edit', compact('chauffeur'));
    }

    public function mettreAjour(Request $request, Chauffeur $chauffeur)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $chauffeur->update($validatedData);

        return redirect()->route('chauffeur.index');
    }

    public function Supprimer(Chauffeur $chauffeur)
    {
        $chauffeur->delete();

        return redirect()->route('chauffeur.index');
    }

    public function chouffeurs() {
        $chauffeurList = Chauffeur::all();
        return view('chauffeur.listCamion', compact('chauffeurList'));
    }

    public function listCamion(Request $request)
    {
        $request->validate([
            'chauffeur' => 'required|exists:chauffeurs,id',
        ],[
            'chauffeur.required' => "Choisi un chauffeur"
        ]);

        $chauffeurId = $request->input('chauffeur');
        $chauffeur = Chauffeur::find($chauffeurId);

        $listCamion = DB::table('livraisons')
            ->join('camions', 'camions.matricule', '=', 'livraisons.idCamion')
            ->join('chauffeurs', 'chauffeurs.id', '=', 'livraisons.idChauffeur')
            ->where('chauffeurs.id', '=', $chauffeurId)
            ->select('camions.*')
            ->get();

        return view('chauffeur.ListCamionIndex', compact('listCamion', 'chauffeur'));
    }

    public function camions() {
        $livraisons = Livraison::all();
        $villesDepartList = $livraisons->unique('villeDepart')->pluck('villeDepart');
    
        return view('chauffeur.listCamionVille', compact('villesDepartList'));
    }
    


    public function listCamionVille(Request $request) {
        $request->validate([
            'villeDepart' => 'required',
        ], [
            'villeDepart.required' => 'Choisissez une ville de depart',
        ]);

        $villeDepart = $request->input('villeDepart');

        $camions = Livraison::where('villeDepart', $villeDepart)
            ->with('camion')
            ->get();

        return view('chauffeur.listCamionVilleIndex', compact('camions', 'villeDepart'));
    }


    public function listVoyage () {
        $Dates = Livraison::distinct('date')->pluck('date');
        return view('voyage.listVoyageDateDonne', compact('Dates'));
    }

    public function listVoyageDateDonne(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ], [
            'date.required' => 'Choisissez une date',
        ]);

        $date = $request->input('date');

        $listVoyages = Livraison::where('date', $date)->get();

        return view('voyage.listVoyageDateDonneIndex', compact('listVoyages', 'date'));
    }

    public function chauffeursSansRetard()
    {
        $query = "
            SELECT c.id, c.nom, c.prenom
            FROM chauffeurs c
            LEFT JOIN livraisons l ON c.id = l.idChauffeur
            WHERE l.id IS NULL OR l.date >= NOW()
        ";

        $chauffeursSansRetard = DB::select($query);

        return view('chauffeur.chauffeurSansRetard', compact('chauffeursSansRetard'));
    }


    public function chauffeursPermisExpireEtLivraisonEncours()
    {
        $query = "
            SELECT c.id, c.nom, c.prenom
            FROM chauffeurs c
            LEFT JOIN permis p ON c.id = p.id
            LEFT JOIN livraisons l ON c.id = l.idChauffeur
            WHERE p.dateExpiration < NOW() AND l.arriverOuNon = 0
        ";

        $chauffeursPermisExpiréEtLivraisonEncours = DB::select($query);

        return view('chauffeur.permisEtLivraison', compact('chauffeursPermisExpiréEtLivraisonEncours'));
    }


    
    
}
