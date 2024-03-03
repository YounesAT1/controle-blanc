@extends('layout.app')

@section('title', 'List offres')

@section('content')
  <div class="my-6">
    <a href="{{ route('offre.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded inline-block mb-4">Ajouter</a>

    <table class="min-w-full bg-white border border-gray-300 ">
      <thead>
        <tr class="text-left">
          <th class="py-3 px-4 bg-gray-200 border-b">ID</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Titre</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Salaire</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Entreprise</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Specialite</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($offresList->count() > 0)
          @foreach ($offresList as $offre)
            <tr>
              <td class="py-2 px-4 border-b">{{ $offre->idO }}</td>
              <td class="py-2 px-4 border-b">{{ $offre->titre }}</td>
              <td class="py-2 px-4 border-b">{{ number_format($offre->salaire, 2) }}</td>
              <td class="py-2 px-4 border-b">{{ $offre->entreprise->nom }}</td>
              <td class="py-2 px-4 border-b">{{ $offre->specialite->titre }}</td>

              <td class="py-2 px-4 border-b">
                <a href="{{ route('offre.edit', $offre) }}" class="bg-blue-500 text-white p-2 rounded mr-2">Modifier</a>
                <form action="{{ route('offre.destroy', $offre) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-white bg-red-500 p-2 rounded">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="6" class="py-2 px-4 border-b text-center">No Offres available</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@endsection
