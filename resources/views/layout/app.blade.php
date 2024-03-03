<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
  </head>

  <body>

    <div class="container mx-auto">
      <nav class="bg-gray-100 p-4 mb-6 rounded-b-md">
        <div class="flex justify-between items-center">
          <a href="/" class="text-slate-900 text-xl font-bold">
            Logo</a>
          <div class="flex space-x-4">
            <a href="{{ route('entreprise.index') }}"
              class="text-slate-700 font-semibold {{ request()->is('entreprises*') ? 'text-violet-700  font-bold' : '' }}">Entreprises</a>
            <a href="{{ route('offre.index') }}"
              class="text-slate-700 font-semibold {{ request()->is('offres*') ? 'text-violet-700 font-bold' : '' }}">Offres</a>
            <a href="{{ route('specialite.index') }}"
              class="text-slate-700 font-semibold {{ request()->is('specialites*') ? 'text-violet-700 font-bold' : '' }}">Specialites</a>
            <a href="{{ route('stagiaire.index') }}"
              class="text-slate-700 font-semibold {{ request()->is('stagiaires*') ? 'text-violet-700 font-bold' : '' }}">Stagiaires</a>
            <a href="{{ route('postuler.index') }}"
              class="text-slate-700 font-semibold {{ request()->is('postulers*') ? 'text-violet-700 font-bold' : '' }}">Postulers</a>
          </div>
        </div>
      </nav>
      @yield('content')
    </div>
  </body>

</html>
