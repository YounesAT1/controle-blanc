@extends('layout.app')

@section('title', 'Stagiiaire Accepter')


@section('content')
  <div class="flex flex-col gap-y-5">
    <table class="min-w-full bg-white border border-gray-300">
      <thead>
        <tr class="text-left">
          <th class="py-2 px-4 border-b">ID</th>
          <th class="py-2 px-4 border-b">Nom</th>
          <th class="py-2 px-4 border-b">Email</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($acceptedStagiaires as $acceptedStagiaire)
          <tr>
            <td class="py-2 px-4 border-b">{{ $acceptedStagiaire->stagiaire->idSt }}</td>
            <td class="py-2 px-4 border-b">{{ $acceptedStagiaire->stagiaire->nom }}</td>
            <td class="py-2 px-4 border-b">{{ $acceptedStagiaire->stagiaire->email }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="py-2 px-4 border-b text-center">Aucun stagiaire accepter </td>
          </tr>
        @endforelse


      </tbody>
    </table>
    <a href="{{ route('offre.index') }}" class="text-white bg-indigo-400 p-2 rounded w-[130px]">Liste d'offres</a>

  </div>

@endsection
