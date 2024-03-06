@extends('layout.app')

@section('title', 'Liste des chauffeurs')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Liste des chauffeurs</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300">
      <thead>
        <tr class="text-left">
          <th class="py-2 px-4 border-b">ID</th>
          <th class="py-2 px-4 border-b">Nom</th>
          <th class="py-2 px-4 border-b">Prenom</th>
          <th class="py-2 px-4 border-b">Nombre de vouyage</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($chauffeurList as $chauffeur)
          <tr>
            <td class="py-2 px-4 border-b">{{ $chauffeur->id }}</td>
            <td class="py-2 px-4 border-b">{{ $chauffeur->nom }}</td>
            <td class="py-2 px-4 border-b">{{ $chauffeur->prenom }}</td>
            <td class="py-2 px-4 border-b">{{ $chauffeur->livraisons_count }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
