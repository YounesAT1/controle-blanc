@extends('layout.app')

@section('title', 'Ajouter entreprise')

@section('content')

  <form action="{{ route('entreprise.store') }}" method="post" autocomplete="off" enctype="multipart/form-data"
    class="max-w-md mx-auto mt-8 bg-white p-8  rounded-lg">
    @csrf
    <div class="mb-4">
      <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
      <input type="text" id="nom" placeholder="Entreprise nom" name="nom" value="{{ old('nom') }}"
        class="w-full p-2 border rounded focus:outline-none focus:border-indigo-500">
      @error('nom')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse</label>
      <input type="text" id="adresse" placeholder="Entreprise adresse" name="adresse" value="{{ old('adresse') }}"
        class="w-full p-2 border rounded focus:outline-none focus:border-indigo-500">
      @error('adresse')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo</label>
      <input type="file" id="photo" name="photo"
        class="w-full p-2 border rounded focus:outline-none focus:border-indigo-500">
      @error('photo')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>
    <button type="submit"
      class="bg-indigo-500 text-white p-2 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
      Ajouter
    </button>
    <a href="{{ route('entreprise.index') }}"
      class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300">
      Annuler
    </a>

  </form>

@endsection
