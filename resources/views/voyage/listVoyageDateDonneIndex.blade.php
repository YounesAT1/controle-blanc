@extends('layout.app')

@section('title', 'Liste des voyages')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Liste des voyages de la date {{ $date }}</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300">
      <thead>
        <tr class="text-left">
          <th class="py-2 px-4 border-b">ID</th>
          <th class="py-2 px-4 border-b">Date</th>
          <th class="py-2 px-4 border-b">Ville de Départ</th>
          <th class="py-2 px-4 border-b">Ville d'Arrivée</th>
          <th class="py-2 px-4 border-b">ID Chauffeur</th>
          <th class="py-2 px-4 border-b">ID Camion</th>
          <th class="py-2 px-4 border-b">Arrivée ou Non</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listVoyages as $voyage)
          <tr>
            <td class="py-2 px-4 border-b">{{ $voyage->id }}</td>
            <td class="py-2 px-4 border-b">{{ $voyage->date }}</td>
            <td class="py-2 px-4 border-b">{{ $voyage->villeDepart }}</td>
            <td class="py-2 px-4 border-b">{{ $voyage->villeArriver }}</td>
            <td class="py-2 px-4 border-b">{{ $voyage->chauffeur->nom }}</td>
            <td class="py-2 px-4 border-b">{{ $voyage->camion->marque }}</td>
            <td class="py-2 px-4 border-b">
              @if ($voyage->arriverOuNon == 1)
                Oui
              @else
                Non
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
