@extends('layout.app')

@section('title', 'Edit Offre')

@section('content')

  <form action="{{ route('offre.update', $offre) }}" method="POST" autocomplete="off"
    class="max-w-md mx-auto mt-8 bg-white p-8  rounded-lg">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="titre" class="block text-sm font-medium text-gray-600">Titre</label>
      <input type="text" id="titre" name="titre" placeholder="Offre titre" value="{{ $offre->titre }}"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('titre')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="salaire" class="block text-sm font-medium text-gray-600">Salaire</label>
      <input type="text" id="salaire" name="salaire" placeholder="Offre salaire" value="{{ $offre->salaire }}"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
      @error('salaire')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="entreprise" class="block text-sm font-medium text-gray-600">Entreprise</label>
      <select name="idE" id="entreprise"
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
        <option value="" disabled>Select an enterprise</option>
        @foreach ($entrepriseList as $entreprise)
          <option value="{{ $entreprise->idE }}" {{ $offre->idE == $entreprise->idE ? 'selected' : '' }}>
            {{ $entreprise->nom }}</option>
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
        <option value="" disabled>Select a specialty</option>
        @foreach ($sspecialiteList as $specialite)
          <option value="{{ $specialite->idSpe }}" {{ $offre->idSpe == $specialite->idSpe ? 'selected' : '' }}>
            {{ $specialite->titre }}</option>
        @endforeach
      </select>
      @error('idSpe')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex space-x-4">
      <button type="submit"
        class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
        Update
      </button>
      <a href="{{ route('offre.index') }}"
        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300">
        Cancel
      </a>
    </div>
  </form>

@endsection
