@extends('layout.app')

@section('title', 'List Permis')

@section('content')
  <div class="p-4">
    <a href="{{ route('permis.create') }}"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</a>
    <table class="mt-4 w-full border-collapse">
      <thead>
        <tr>
          <th class="border border-gray-400 px-4 py-2">Numero</th>
          <th class="border border-gray-400 px-4 py-2">Type</th>
          <th class="border border-gray-400 px-4 py-2">Date Expiration</th>
          <th class="border border-gray-400 px-4 py-2">Chauffeur</th>
          <th class="border border-gray-400 px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($permisList as $permi)
          <tr>
            <td class="border border-gray-400 px-4 py-2">{{ $permi->numero }}</td>
            <td class="border border-gray-400 px-4 py-2">{{ $permi->type }}</td>
            <td class="border border-gray-400 px-4 py-2">{{ $permi->dateExpiration }}</td>
            <td class="border border-gray-400 px-4 py-2">{{ $permi->id }}</td>
            <td class="border border-gray-400 px-4 py-2">
              <a href="{{ route('permis.edit', $permi) }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Modifier</a>
              <form action="{{ route('permis.delete', $permi) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit"
                  class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td class="border text-center border-gray-400 px-4 py-2" colspan="5"> No Permis</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
