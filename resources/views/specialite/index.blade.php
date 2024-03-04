@extends('layout.app')

@section('title', 'List specialite')

@section('content')
  <div class="my-6">
    <div class="flex items-center justify-between">
      <div class="flex items-center gap-x-2">
        <form action="{{ route('specialite.offreList') }}" method="post">
          @csrf
          <select name="specialiteOffres" id="especialiteOffres" class="p-2 border rounded">
            <option value="" disabled selected class="text-gray-500">Choisissez une specialite</option>
            @foreach ($specialiteList as $specialite)
              <option value="{{ $specialite->idSpe }}">{{ $specialite->titre }}</option>
            @endforeach
          </select>
          <button type="submit"
            class="bg-indigo-500 text-white p-2 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline-blue">
            Afficher Offres
          </button>
          @error('specialiteOffres')
            <p class="text-red-500 text-l">{{ $message }}</p>
          @enderror
        </form>

      </div>

      <a href="{{ route('specialite.create') }}"
        class="bg-blue-500 text-white py-2 px-4 rounded inline-block mb-4">Ajouter</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 ">
      <thead>
        <tr class="text-left">
          <th class="py-3 px-4 bg-gray-200 border-b">ID</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Titre</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Description</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Nombre d'offre</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Action</th>
        </tr>
      </thead>
      <tbody>
        @if ($specialiteList->count() > 0)
          @foreach ($specialiteList as $specialite)
            <tr>
              <td class="py-2 px-4 border-b">{{ $specialite->idSpe }}</td>
              <td class="py-2 px-4 border-b">{{ $specialite->titre }}</td>
              <td class="py-2 px-4 border-b">{{ $specialite->description }}</td>
              <td class="py-2 px-4 border-b">{{ $specialite->offres_count }}</td>

              <td class="py-2 px-4 border-b">
                <a href="{{ route('specialite.edit', $specialite) }}"
                  class="bg-blue-500 text-white p-2 rounded mr-2">Modifier</a>
                <form action="{{ route('specialite.destroy', $specialite) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-white bg-red-500 p-2 rounded">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="4" class="py-2 px-4 border-b text-center">No specialite available</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@endsection
