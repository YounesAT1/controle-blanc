@extends('layout.app')

@section('title', 'Modifier le stagiaire')

@section('content')

  <form action="{{ route('stagiaire.update', $stagiaire) }}" method="POST" enctype="multipart/form-data" autocomplete="off"
    class="max-w-md mx-auto mt-8">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="nom" class="block text-sm font-medium text-gray-600">Nom</label>
      <input type="text" id="nom" name="nom" placeholder="Nom du stagiaire" value="{{ $stagiaire->nom }}"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('nom')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="prenom" class="block text-sm font-medium text-gray-600">Prenom</label>
      <input type="text" id="prenom" name="prenom" placeholder="Prenom du stagiaire"
        value="{{ $stagiaire->prenom }}"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('prenom')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
      <input type="email" id="email" name="email" placeholder="Email du stagiaire" value="{{ $stagiaire->email }}"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('email')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="cv" class="block text-sm font-medium text-gray-600">CV</label>
      <input type="file" id="cv" name="cv" placeholder="CV du stagiaire"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('cv')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex space-x-4">
      <button type="submit"
        class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
        Modifier
      </button>
      <a href="{{ route('stagiaire.index') }}"
        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300">
        Annuler
      </a>
    </div>
  </form>

@endsection
