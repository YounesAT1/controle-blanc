@extends('layout.app')

@section('title', 'List Camion')

@section('content')
  <div class="container mx-auto mt-8">
    <form action="{{ route('chauffeur.listCamionVilleIndex') }}" method="post"
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
      <div class="mb-4">
        <label for="villeDepart" class="block text-gray-700 text-sm font-bold mb-2">Select Ville de Depart:</label>
        <select name="villeDepart" id="villeDepart"
          class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
          <option value="" disabled selected>Choisir une ville de depart</option>
          @foreach ($villesDepartList as $ville)
            <option value="{{ $ville }}" {{ old('villeDepart') == $ville ? 'selected' : '' }}>{{ $ville }}
            </option>
          @endforeach
        </select>
        @error('villeDepart')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex items-center justify-between">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          List Camions
        </button>
      </div>
    </form>


  </div>
@endsection
