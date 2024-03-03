@extends('layout.app')

@section('title', 'Offres')

@section('content')
  <div class="container mt-5 my-4">
    <h1 class="text-2xl font-bold mb-4">Offres de {{ $specialite->titre }}</h1>

    <table class="min-w-full bg-white border border-gray-300 rounded">
      <thead>
        <tr class="text-left">
          <th class="py-2 px-4 border-b">Titre</th>
          <th class="py-2 px-4 border-b">Entreprise</th>
          <th class="py-2 px-4 border-b">Salaire</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($offres as $offre)
          <tr>
            <td class="py-2 px-4 border-b">{{ $offre->titre }}</td>
            <td class="py-2 px-4 border-b">{{ $offre->entreprise->nom }}</td>
            <td class="py-2 px-4 border-b">{{ number_format($offre->salaire, 2) }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="py-4 px-4 border-b text-center">Aucune offre disponible</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <a href="{{ route('specialite.index') }}" class="text-white bg-indigo-400 p-2 rounded ">Liste specialites</a>
@endsection
