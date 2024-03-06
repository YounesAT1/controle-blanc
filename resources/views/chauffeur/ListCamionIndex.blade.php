@extends('layout.app')

@section('title', 'listCamion')

@section('content')

  <div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">{{ $chauffeur->nom }} {{ $chauffeur->prenom }}'s Camions</h2>

    @if (count($listCamion) > 0)
      <table class="min-w-full bg-white border border-gray-300">
        <thead>
          <tr class="text-left">
            <th class="py-2 px-4 border-b">Matricule</th>
            <th class="py-2 px-4 border-b">Marque</th>
            <th class="py-2 px-4 border-b">Picture</th> <!-- New column for the picture -->
          </tr>
        </thead>
        <tbody>
          @foreach ($listCamion as $camion)
            <tr>
              <td class="py-2 px-4 border-b">{{ $camion->matricule }}</td>
              <td class="py-2 px-4 border-b">{{ $camion->marque }}</td>
              <td class="py-2 px-4 border-b">
                @if ($camion->photo)
                  <img src="{{ $camion->photo }}" alt="Camion Picture" class="w-16 h-16 object-cover rounded-full">
                @else
                  <span class="text-gray-400">No Picture</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-gray-600">No camions found for this chauffeur.</p>
    @endif
  </div>

@endsection
