  @extends('layout.app')

  @section('title', 'Liste des stagiaires')

  @section('content')
    <div class="my-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-x-2">
          <form action="{{ route('stagiaire.offreList') }}" method="post">
            @csrf
            <select name="stagiaireOffres" id="stagiaireOffres" class="p-2 border rounded">
              <option value="" disabled selected class="text-gray-500">Choisissez un stagiaire</option>
              @foreach ($stagiairesList as $stagiaire)
                <option value="{{ $stagiaire->idSt }}">{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</option>
              @endforeach
            </select>
            <button type="submit"
              class="bg-indigo-500 text-white p-2 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline-blue">
              Afficher Offres
            </button>
            @error('stagiaireOffres')
              <p class="text-red-500 text-l">{{ $message }}</p>
            @enderror
          </form>

        </div>

        <a href="{{ route('stagiaire.create') }}"
          class="bg-blue-500 text-white py-2 px-4 rounded inline-block mb-4">Ajouter</a>
      </div>


      <table class="min-w-full bg-white border border-gray-300 ">
        <thead>
          <tr class="text-left">
            <th class="py-3 px-4 bg-gray-200 border-b">ID</th>
            <th class="py-3 px-4 bg-gray-200 border-b">Nom</th>
            <th class="py-3 px-4 bg-gray-200 border-b">Prenom</th>
            <th class="py-3 px-4 bg-gray-200 border-b">Email</th>
            <th class="py-3 px-4 bg-gray-200 border-b">CV</th>
            <th class="py-3 px-4 bg-gray-200 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          @if ($stagiairesList->count() > 0)
            @foreach ($stagiairesList as $stagiaire)
              <tr>
                <td class="py-2 px-4 border-b">{{ $stagiaire->idSt }}</td>
                <td class="py-2 px-4 border-b">{{ $stagiaire->nom }}</td>
                <td class="py-2 px-4 border-b">{{ $stagiaire->prenom }}</td>
                <td class="py-2 px-4 border-b">{{ $stagiaire->email }}</td>
                <td class="py-2 px-4 border-b">

                  {{-- ! THIS IS ONLY GOONA WORK IF I ADDED THE STAGIAIRE MANUALY WITHOUT THE FACTORY AND SEEDER --}}
                  <a class="underline text-blue-500" href="/{{ $stagiaire->cv }}" target="_blank">Voir CV</a>
                </td>

                <td class="py-2 px-4 border-b">
                  <a href="{{ route('stagiaire.edit', $stagiaire) }}"
                    class="bg-blue-500 text-white p-2 rounded mr-2">Modifier</a>
                  <form action="{{ route('stagiaire.destroy', $stagiaire) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-500 p-2 rounded">Supprimer</button>
                  </form>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6" class="py-2 px-4 border-b text-center">Aucun stagiaire disponible</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  @endsection
