@extends('layout.app')

@section('title', 'Chauffeurs avec permis expiré et livraison en cours')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Liste des chauffeurs avec permis expiré et livraison en cours</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b">ID</th>
          <th class="py-2 px-4 border-b">Nom</th>
          <th class="py-2 px-4 border-b">Prénom</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($chauffeursPermisExpiréEtLivraisonEncours as $chauffeur)
          <tr>
            <td class="py-2 px-4 border-b">{{ $chauffeur->id }}</td>
            <td class="py-2 px-4 border-b">{{ $chauffeur->nom }}</td>
            <td class="py-2 px-4 border-b">{{ $chauffeur->prenom }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
