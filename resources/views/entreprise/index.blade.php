@extends('layout.app')

@section('title', 'List entreprise')

@section('content')
  <div class="my-6">
    <div class="flex items-center justify-between">
      <div class="flex items-center gap-x-2">
        <form action="{{ route('entreprise.offreList') }}" method="post">
          @csrf
          <select name="entrepriseOffres" id="entrepriseOffres" class="p-2 border rounded">
            <option value="" disabled selected class="text-gray-500">Choisissez une entreprise</option>
            @foreach ($entreprisesList as $entreprise)
              <option value="{{ $entreprise->idE }}">{{ $entreprise->nom }}</option>
            @endforeach
          </select>
          <button type="submit"
            class="bg-indigo-500 text-white p-2 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline-blue">
            Afficher Offres
          </button>
          @error('entrepriseOffres')
            <p class="text-red-500 text-l">{{ $message }}</p>
          @enderror
        </form>

      </div>

      <a href="{{ route('entreprise.create') }}"
        class="bg-blue-500 text-white py-2 px-4 rounded inline-block mb-4">Ajouter</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 ">
      <thead>
        <tr class="text-left">
          <th class="py-3 px-4 bg-gray-200 border-b">ID</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Nom</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Adresse</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Photo</th>
          <th class="py-3 px-4 bg-gray-200 border-b">Action</th>
        </tr>
      </thead>
      <tbody>
        @if ($entreprisesList->count() > 0)
          @foreach ($entreprisesList as $entreprise)
            <tr>
              <td class="py-2 px-4 border-b">{{ $entreprise->idE }}</td>
              <td class="py-2 px-4 border-b">{{ $entreprise->nom }}</td>
              <td class="py-2 px-4 border-b">{{ $entreprise->adresse }}</td>
              <td class="py-2 px-4 border-b">
                {{-- ! WITHOUT SEEDERS --}}

                {{-- <img src="/{{ $entreprise->photo }}" alt="{{ $entreprise->nom }}"
                  class="w-10 h-10 object-cover rounded-full"> --}}

                {{-- ! WITH SEEDERS --}}

                <img src="{{ $entreprise->photo }}" alt="{{ $entreprise->nom }}"
                  class="w-10 h-10 object-cover rounded-full">
              </td>
              <td class="py-2 px-4 border-b">
                <a href="{{ route('entreprise.edit', $entreprise) }}"
                  class="bg-blue-500 text-white p-2 rounded mr-2">Modifier</a>
                <form action="{{ route('entreprise.destroy', $entreprise) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-white bg-red-500 p-2 rounded">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="5" class="py-2 px-4 border-b text-center">No entreprise available</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@endsection
