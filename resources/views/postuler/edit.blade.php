@extends('layout.app')

@section('title', 'Modifier postulation')

@section('content')
  <div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Modifier une postulation</h1>

    <form action="{{ route('postuler.update', $postuler) }}" method="post" autocomplete="off"
      class="max-w-md mx-auto bg-white p-8 rounded-lg">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="etat" class="block text-sm font-medium text-gray-600">État</label>
        <select name="etat" id="etat"
          class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
          <option value="" disabled>Choisir la decision</option>
          <option value="accepter" @if ($postuler->etat === 'accepter') selected @endif>Accepter</option>
          <option value="refuser" @if ($postuler->etat === 'refuser') selected @endif>Refuser</option>
        </select>
        @error('etat')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="idSt" class="block text-sm font-medium text-gray-600">Stagiaire</label>
        <select name="idSt" id="idSt"
          class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
          <option value="" disabled>Sélectionner un stagiaire</option>
          @foreach ($stagiaires as $stagiaire)
            <option value="{{ $stagiaire->idSt }}" @if ($postuler->idSt === $stagiaire->idSt) selected @endif>
              {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
            </option>
          @endforeach
        </select>
        @error('idSt')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="idO" class="block text-sm font-medium text-gray-600">Offre</label>
        <select name="idO" id="idO"
          class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
          <option value="" disabled>Sélectionner une offre</option>
          @foreach ($offres as $offre)
            <option value="{{ $offre->idO }}" @if ($postuler->idO === $offre->idO) selected @endif>
              {{ $offre->titre }}
            </option>
          @endforeach
        </select>
        @error('idO')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex space-x-4">
        <button type="submit"
          class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
          Modifier
        </button>
        <a href="{{ route('postuler.index') }}"
          class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300">
          Annuler
        </a>
      </div>
    </form>
  </div>
@endsection
