@extends('layout.app')

@section('title', 'Edit Entreprise')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Edit Entreprise</h1>

  <form action="{{ route('entreprise.update', $entreprise) }}" method="POST" enctype="multipart/form-data" autocomplete="off"
    class="max-w-md mx-auto mt-8 bg-white p-8 ">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
      <input type="text" name="nom" id="nom" value="{{ $entreprise->nom }}"
        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500">
      @error('nom')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse:</label>
      <input type="text" name="adresse" id="adresse" value="{{ $entreprise->adresse }}"
        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500">
      @error('adresse')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
      <input type="file" name="photo" id="photo"
        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500">
      @error('photo')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center gap-x-2">
      <button type="submit"
        class="bg-indigo-500 text-white p-2 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline-blue">
        Modifier
      </button>
      <a href="{{ route('entreprise.index') }}"
        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300">
        Annuler
      </a>
    </div>
  </form>

@endsection
