@extends('layout.app')

@section('title', 'Ajouter specialite')

@section('content')

  <form action="{{ route('specialite.store') }}" method="post" autocomplete="off"
    class="max-w-md mx-auto mt-8 bg-white p-8  rounded-lg ">
    @csrf
    <div class="mb-4">
      <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
      <input type="text" id="titre" placeholder="Specialite nom" name="titre" value="{{ old('titre') }}"
        class="w-full p-2 border rounded focus:outline-none focus:border-indigo-500">
      @error('titre')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
      <textarea id="description" placeholder="Specialite description" name="description"
        class="w-full p-2 border rounded focus:outline-none focus:border-indigo-500">{{ old('description') }}</textarea>
      @error('description')
        <p class="text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
      class="bg-indigo-500 text-white p-2 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
      Ajouter
    </button>
    <a href="{{ route('specialite.index') }}"
      class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300">
      Annuler
    </a>
  </form>

@endsection
