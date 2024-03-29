<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PermiController;
use App\Http\Controllers\PostulerController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\SpecialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//? ENTREPRISE ROUTES

Route::get('/entreprises', [EntrepriseController::class, 'index'])->name('entreprise.index');
Route::get('/entreprises/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
Route::post('/entreprises/store', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprises/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
Route::put('/entreprises/{entreprise}', [EntrepriseController::class, 'update'])->name('entreprise.update');
Route::delete('/entreprises/{entreprise}', [EntrepriseController::class, 'destroy'])->name('entreprise.destroy');
Route::post('/entreprises/offres', [EntrepriseController::class, 'offreList'])->name('entreprise.offreList');

//? OFFRE ROUTES

Route::get('/offres',[OffreController::class, 'index'])->name('offre.index');
Route::get('/offres/create', [OffreController::class, 'create'])->name('offre.create');
Route::post('/offres/store', [OffreController::class, 'store'])->name('offre.store');
Route::get('/offres/{offre}/edit', [OffreController::class, 'edit'])->name('offre.edit');
Route::put('/offres/{offre}', [OffreController::class, 'update'])->name('offre.update');
Route::delete('/offres/{offre}', [OffreController::class, 'destroy'])->name('offre.destroy');
Route::post('/offres/stagiaireAccepter', [OffreController::class, 'stagiaireAccepter'])->name('offre.stagiaireAccepter');


//? SPECIALITE ROUTES

Route::get('/specialites',[SpecialiteController::class, 'index'])->name('specialite.index');
Route::get('/specialites/create', [SpecialiteController::class, 'create'])->name('specialite.create');
Route::post('/specialites/store', [SpecialiteController::class, 'store'])->name('specialite.store');
Route::get('/specialites/{specialite}/edit', [SpecialiteController::class, 'edit'])->name('specialite.edit');
Route::put('/specialites/{specialite}', [SpecialiteController::class, 'update'])->name('specialite.update');
Route::delete('/specialites/{specialite}', [SpecialiteController::class, 'destroy'])->name('specialite.destroy');
Route::post('/specialites/offres', [SpecialiteController::class, 'offreList'])->name('specialite.offreList');


//? STAGIAIRE ROUTES

Route::get('/stagiaires',[StagiaireController::class, 'index'])->name('stagiaire.index');
Route::get('/stagiaires/create', [StagiaireController::class, 'create'])->name('stagiaire.create');
Route::post('/stagiaires', [StagiaireController::class, 'store'])->name('stagiaire.store');
Route::get('/stagiaires/{stagiaire}/edit', [StagiaireController::class, 'edit'])->name('stagiaire.edit');
Route::put('/stagiaires/{stagiaire}', [StagiaireController::class, 'update'])->name('stagiaire.update');
Route::delete('/stagiaires/{stagiaire}', [StagiaireController::class, 'destroy'])->name('stagiaire.destroy');
Route::post('/stagiaires/offres', [StagiaireController::class, 'offreList'])->name('stagiaire.offreList');

//? POSTULER ROUTES

Route::get('/postulers',[PostulerController::class, 'index'])->name('postuler.index');
Route::get('/postulers/create', [PostulerController::class, 'create'])->name('postuler.create');
Route::post('/postulers', [PostulerController::class, 'store'])->name('postuler.store');
Route::get('/postulers/{postuler}/edit', [PostulerController::class, 'edit'])->name('postuler.edit');
Route::put('/postulers/{postuler}', [PostulerController::class, 'update'])->name('postuler.update');
Route::delete('/postulers/{postuler}', [PostulerController::class, 'destroy'])->name('postuler.destroy');


//? ROUTES FOR CHAUFFEUR
Route::get('/chauffeurs',[ChauffeurController::class, 'afficherList'])->name('chauffeurs.index');
// Route::post('/chauffeurs', [ChauffeurController::class, 'ajouter']);
// Route::get('/chauffeurs/{chauffeur}/edit', [ChauffeurController::class, 'modifier']);
// Route::put('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'mettreAjour']);
// Route::delete('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'Supprimer']);


route::get('/chauffeurs/listCamion',[ChauffeurController::class, 'chouffeurs'])->name('chauffeur.listCamion');
Route::post('/show-camions', [ChauffeurController::class, 'listCamion'])->name('chauffeur.showCamions');

route::get('/listCamion',[ChauffeurController::class, 'camions'])->name('chauffeur.listCamionVille');
Route::post('/listCamion/ville', [ChauffeurController::class, 'listCamionVille'])
    ->name('chauffeur.listCamionVilleIndex');

Route::get('/chauffeur-sans-retard', [ChauffeurController::class, 'chauffeursSansRetard'])->name('chauffeurs.chauffeurSansRetard');

Route::get('/chauffeur-avec-permi-expere', [ChauffeurController::class, 'chauffeursPermisExpireEtLivraisonEncours'])->name('chauffeurs.chauffeursPermisExpireEtLivraisonEncours');


//? PERMIS ROUTES

Route::get('/permis', [PermiController::class, 'afficherList'])->name('permis.index');
Route::get('/permis/create', [PermiController::class, 'afficherForm'])->name('permis.create');
Route::post('/permis/store', [PermiController::class, 'ajouter'])->name('permis.store');
Route::get('/permis/{permis}/edit', [PermiController::class, 'modifier'])->name('permis.edit');
Route::put('/permis/{permis}/update', [PermiController::class, 'mettreAjour'])->name('permis.update');
Route::delete('/permis/{permis}/delete', [PermiController::class, 'supprimer'])->name('permis.delete');


Route::get('/listVouyage', [ChauffeurController::class, 'listVoyage'])->name('voyages.listVoyage');
Route::post('/listVouyage/date', [ChauffeurController::class, 'listVoyageDateDonne'])->name('voyages.listVoyageDateDonne');









Route::get('/', function () {
    return view('welcome');
});
