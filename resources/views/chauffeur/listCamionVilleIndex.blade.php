@extends('layout.app')

@section('title', 'list camion vile')

@section('content')
  <h1 class="text-2xl font-bold mb-4"> List camion de ville {{ $villeDepart }}
  </h1>
  @if (count($camions) > 0)
    <table class="min-w-full bg-white border border-gray-300">
      <thead>
        <tr class="text-left">
          <th class="py-2 px-4 border-b">Matricule</th>
          <th class="py-2 px-4 border-b">Marque</th>
          <th class="py-2 px-4 border-b">Picture</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($camions as $camion)
          <tr>
            <td class="py-2 px-4 border-b">{{ $camion->camion->matricule }}</td>
            <td class="py-2 px-4 border-b">{{ $camion->camion->marque }}</td>
            <td class="py-2 px-4 border-b">
              @if ($camion->camion->photo)
                <img src="{{ $camion->camion->photo }}" alt="Camion Picture" class="w-16 h-16 object-cover rounded-full">
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
@endsection
