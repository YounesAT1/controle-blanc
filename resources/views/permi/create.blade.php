@extends('layout.app')

@section('title', 'Add Permis')

@section('content')
  <div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-4">Ajouter Permis</h2>

    <form action="{{ route('permis.store') }}" method="post" class="w-3/5" autocomplete="off">
      @csrf

      <div class="mb-4">
        <label for="numero" class="block text-sm font-medium text-gray-600">Numero</label>
        <input type="text" name="numero" id="numero" class="mt-1 p-2 border rounded w-full">
        @error('numero')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="type" class="block text-sm font-medium text-gray-600">Type</label>
        <input type="text" name="type" id="type" class="mt-1 p-2 border rounded w-full">
        @error('type')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="dateExpiration" class="block text-sm font-medium text-gray-600">Date Expiration</label>
        <input type="date" name="dateExpiration" id="dateExpiration" class="mt-1 p-2 border rounded w-full">
        @error('dateExpiration')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="id" class="block text-sm font-medium text-gray-600">Chauffeur</label>
        <select name="id" id="id" class="mt-1 p-2 border rounded w-full">
          <option value="" disabled selected>Choisi chauffeur</option>
          @foreach ($chauffeurs as $chauffeur)
            <option value="{{ $chauffeur->id }}">{{ $chauffeur->nom }} {{ $chauffeur->prenom }}</option>
          @endforeach
        </select>
        @error('id')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-8">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Ajouter Permis</button>
      </div>
    </form>
  </div>
@endsection
