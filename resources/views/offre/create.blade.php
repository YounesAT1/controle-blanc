@extends('layout.app')

@section('title', 'Ajouter offre')

@section('content')

  <form action="{{ route('offre.store') }}" method="post" autocomplete="off" class="max-w-md mx-auto mt-8">
    @csrf
    <div class="mb-4">
      <label for="titre" class="block text-sm font-medium text-gray-600">Titre</label>
      <input type="text" id="titre" name="titre" placeholder="Offre titre" value="{{ old('titre') }}"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('titre')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="salaire" class="block text-sm font-medium text-gray-600">Salaire</label>
      <input type="text" id="salaire" name="salaire" placeholder="Offre salaire" value="{{ old('salaire') }}"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('salaire')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="entreprise" class="block text-sm font-medium text-gray-600">Entreprise</label>
      <select name="idE" id="entreprise"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
        <option value="" disabled selected>Select an enterprise</option>
        @foreach ($entrepriseList as $entreprise)
          <option value="{{ $entreprise->idE }}">{{ $entreprise->nom }}</option>
        @endforeach
      </select>
      @error('idE')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="specialite" class="block text-sm font-medium text-gray-600">Specialite</label>
      <select name="idSpe" id="specialite"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
        <option value="" disabled selected>Select a specialty</option>
        @foreach ($sspecialiteList as $specialite)
          <option value="{{ $specialite->idSpe }}">{{ $specialite->titre }}</option>
        @endforeach
      </select>
      @error('idSpe')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex space-x-4">
      <button type="submit"
        class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
        Ajouter
      </button>
      <a href="{{ route('offre.index') }}"
        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300">
        Annuler
      </a>
    </div>
  </form>

@endsection
