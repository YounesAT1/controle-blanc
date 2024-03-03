@extends('layout.app')

@section('title', 'Liste des postulations')

@section('content')
  <div class="container mx-auto mt-8">
    <a href="{{ route('postuler.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded inline-block mb-4">Ajouter</a>


    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-300">
        <thead>
          <tr class="text-left">
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Etat</th>
            <th class="py-2 px-4 border-b">Stagiaire</th>
            <th class="py-2 px-4 border-b">Offre</th>
            <th class="py-2 px-4 border-b"> Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($postulerList as $postuler)
            <tr>
              <td class="py-2 px-4 border-b">{{ $postuler->idP }}</td>
              <td class="py-2 px-4 border-b">
                <span
                  class="text-white p-2 rounded @if ($postuler->etat === 'accepter') bg-green-500 @else bg-red-500 @endif">
                  {{ $postuler->etat }}
                </span>
              </td>

              <td class="py-2 px-4 border-b">{{ $postuler->stagiaire->nom }} {{ $postuler->stagiaire->prenom }}</td>
              <td class="py-2 px-4 border-b">{{ $postuler->offre->titre }}</td>
              <td class="py-2 px-4 border-b">
                <a href="{{ route('postuler.edit', $postuler) }}"
                  class="bg-blue-500 text-white p-2 rounded mr-2">Modifier</a>
                <form action="{{ route('postuler.destroy', $postuler) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-white bg-red-500 p-2 rounded">Supprimer</button>
                </form>
              </td>

            </tr>
          @empty
            <tr>
              <td colspan="5" class="py-4 px-6 text-center">Aucune postulation disponible.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
