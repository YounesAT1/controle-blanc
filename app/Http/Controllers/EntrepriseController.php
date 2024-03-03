<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprisesList = Entreprise::all();
        return view('entreprise.index', compact('entreprisesList'));
    }

    public function create()
    {
        return view('entreprise.create');
    }

    public function validerAjouterEntrepriseChamps(Request $request)
    {
        return $request->validate([
            'nom' => 'required|max:255',
            'adresse' => 'required|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120', 
        ], [
            'nom.required' => 'Nom est obligatoire',
            'adresse.required' => 'Adresse est obligatoire',
            'photo.required' => 'Photo est obligatoire',
            'photo.image' => 'Le fichier doit être une image',
            'photo.mimes' => 'Les formats d\'image autorisés sont : jpg, jpeg, png',
            'photo.max' => 'La taille de l\'image ne doit pas dépasser 5 Mo',
        ]);
    }

    public function validerModifierEntrepriseChamps(Request $request)
    {
        return $request->validate([
            'nom' => 'required|max:255',
            'adresse' => 'required|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', 
        ], [
            'nom.required' => 'Nom est obligatoire',
            'adresse.required' => 'Adresse est obligatoire',
        ]);
    }

    public function validerImage(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array($fileExtension, $allowedExtensions) || $fileSize > 5120000) {
                return back()->with('status', 'Extension ou taille d\'image invalide');
            }

            $folder = 'pictures';
            $token = uniqid();
            $photoSrc = $folder . '/' . $token . '-' . $file->getClientOriginalName();

            $file->move($folder, $token . '-' . $file->getClientOriginalName());

            return $photoSrc;
        } else {
            return back()->with('status', 'Aucun fichier téléchargé');
        }
    }

    public function store(Request $request)
    {
        $this->validerAjouterEntrepriseChamps($request);

        $photoSrc = $this->validerImage($request);

        $entreprise = $request->post();
        $entreprise['photo'] = $photoSrc;

        Entreprise::create($entreprise);
        return redirect()->route('entreprise.index')->with('status', 'Entreprise ajoutée avec succès');
    }

    public function edit(Entreprise $entreprise)
    {
        return view('entreprise.edit', compact('entreprise'));
    }

    public function update(Request $request, Entreprise $entreprise)
    {
        $validatedData = $this->validerModifierEntrepriseChamps($request);

        if ($request->hasFile('photo')) {
            $entreprise->photo = $this->validerImage($request);
        }

        $entreprise->nom = $validatedData['nom'];
        $entreprise->adresse = $validatedData['adresse'];
        $entreprise->save();

        return redirect()->route('entreprise.index')->with('status', 'Entreprise modifiée avec succès');
    }

    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();
        return redirect()->route('entreprise.index')->with('status', 'L\'entreprise a été supprimée avec succès !');
    }

    public function offreList(Request $request) {
        $request->validate([
            'entrepriseOffres' => 'required|exists:entreprises,idE',
        ],[
            'entrepriseOffres.required' => "Selectionner une entrprise"
        ]);
    
        $entrepriseId = $request->input('entrepriseOffres');
    
        $entreprise = Entreprise::find($entrepriseId);
        $offres = $entreprise->offres; 
    
        return view('entreprise.offreList', compact('offres','entreprise'));
    }
}
