@extends('layout.app')

@section('title', 'List Voyages by Date')

@section('content')
  <div class="container mx-auto mt-8">
    <form action="{{ route('voyages.listVoyageDateDonne') }}" method="post"
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
      <div class="mb-4">
        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Select Date:</label>
        <select name="date" id="date"
          class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
          <option value="" disabled selected>Choisir une date</option>
          @foreach ($Dates as $date)
            <option value="{{ $date }}">{{ $date }}</option>
          @endforeach
        </select>
        @error('date')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex items-center justify-between">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          List Voyages
        </button>
      </div>
    </form>
  </div>
@endsection
