<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
  </head>

  <body>

    <div class="container mx-auto">
      <nav class="bg-gray-100 p-4 mb-6 rounded-b-md">
        <div class="">
          <div class="flex justify-between items-center">

            <a href="{{ route('permis.index') }}" class="text-slate-700 font-semibold">Permis</a>
            <a href="{{ route('chauffeur.listCamion') }}" class="text-slate-700 font-semibold">List camion de
              chauffeur</a>
            <a href="{{ route('chauffeur.listCamionVille') }}" class="text-slate-700 font-semibold">List camion de
              Ville Depart</a>
            <a href="{{ route('voyages.listVoyage') }}" class="text-slate-700 font-semibold">List Voyages Date
              Donne</a>
            <a href="{{ route('chauffeurs.index') }}" class="text-slate-700 font-semibold">chauffeur</a>
            <a href="{{ route('chauffeurs.chauffeurSansRetard') }}" class="text-slate-700 font-semibold">chauffeur sans
              retard</a>
            <a href="{{ route('chauffeurs.chauffeursPermisExpireEtLivraisonEncours') }}"
              class="text-slate-700 font-semibold">chauffeur avec permi expere</a>


            {{-- <a href="{{ route('entreprise.index') }}" class="text-slate-700 font-semibold">Entreprises</a>
            <a href="{{ route('offre.index') }}" class="text-slate-700 font-semibold">Offres</a>
            <a href="{{ route('specialite.index') }}" class="text-slate-700 font-semibold">Specialites</a>
            <a href="{{ route('stagiaire.index') }}" class="text-slate-700 font-semibold">Stagiaires</a>
            <a href="{{ route('postuler.index') }}" class="text-slate-700 font-semibold">Postulers</a> --}}
          </div>
        </div>
      </nav>
      @yield('content')
    </div>
  </body>

</html>
