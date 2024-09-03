@extends('admin.admin')
@section('content')

    <body class="bg-gray-100">
        @csrf

        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md">
                <div class="p-4">
                    <h1 class="text-blue-500 text-xl font-bold text-center">Admin</h1>

                </div>

                <div class="flex items-center justify-center h-16">
                    <img src="{{ asset('image\ESP.jpg') }}" alt="logo" class="h-20">

                </div>

                <nav class="mt-10">
                    <a href="#"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                        Accueil
                    </a>

                    <a href="#"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                        Courriers
                    </a>


                    <a href="#"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                        aide
                    </a>
                    <a href="#"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                        parametre
                    </a>
                </nav>
            </aside>

            <!-- Main content -->
            <div class="flex-1 p-6">
                <!-- Header -->
                <div class="flex justify-between items-center pb-6">
                    <h1 class="text-blue-500 text-2xl font-bold">-GESTION DE COURRIER-</h1>
                    <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                            <span>Kevin</span>
                            <img src="{{ asset('image\591921.jpg') . '?' . time() }}" alt="AVATAR" class="h-8">
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th
                                class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                type de courrier</th>

                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    objet courrier</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    nature courrier</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    expediteur</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    destinataire</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    adresse_exp</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    adresse_dest</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    date_exp</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    Date arriver</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    reception</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Exemple de ligne -->

                            @foreach ($courriers as $courrier)
                            @if($courrier) <!-- Vérification que l'objet $courrier est valide -->
                                <tr>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->type_courrier }}</td>

                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->objet_courrier }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->nature_courrier }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->nom_exp }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->nom_dest }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->adresse_exp }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->adresse_dest }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->date_exp }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->date_arrive }}</td>
                                    <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                        {{ $courrier->reception }}</td>

                                </tr>

                            @endif
                        @endforeach





                            <!-- Ajoutez plus de lignes ici -->
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('courriers.courriers.create') }}"
                    class="relative inline-flex  hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-5 text-center text-base font-semibold text-white outline-none">ajouter</a>

                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    <nav class="relative z-0 inline-flex shadow-sm -space-x-px">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span>Précédent</span>
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">11</a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span>Suivant</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

    </body>

    <!-- Main Content -->
    <div class="content">

        <div class="header">
            <div>
                <a href="#profile" class="text-white">Profil</a>
                <a href="#logout" class="text-white ml-3">Déconnexion</a>
            </div>
        </div>


        <!-- Users Content -->
        <div id="users" style="display:none;">
            <h2>Liste des Utilisateurs</h2>
            <!-- Tableau des utilisateurs ici -->
        </div>

        <!-- Courriers Content -->
        <div id="courriers" style="display:none;">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>courriers</h1>

                </div>
            </div>
        </div>




        <script>
            document.querySelectorAll('.sidebar a').forEach(link => {
                link.addEventListener('click', function() {
                    document.querySelectorAll('.content > div').forEach(section => {
                        section.style.display = 'none';
                    });
                    document.querySelector(link.getAttribute('href')).style.display = 'block';
                });
            });
        </script>

    </div>




                  <!-- Bloc Annonces -->
                <div class="mt-8">

                    <h2 class="text-blue-500 text-2xl font-bold mb-4">Liste des annonces</h2>
                    <div class="overflow-x-auto bg-white shadow-md rounded-lg">

                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">Titre</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">Annonce</th>
                                    <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($Annonces) && $Annonces->isNotEmpty())
                                    @foreach($Annonces as $annonce)
                                        <tr>
                                            <td class="py-3 px-4 border-b border-gray-200">{{ $annonce->titre }}</td>
                                            <td class="py-3 px-4 border-b border-gray-200">{{ $annonce->annonce }}</td>
                                            <td class="py-3 px-4 border-b border-gray-200">
                                                <!-- Afficher l'image uniquement si elle existe -->
                                                @if($annonce->image && file_exists(public_path('storage/' . $annonce->image)))
                                                    <img src="{{ asset('storage/' . $annonce->image) }}" alt="Image de l'annonce" class="img-thumbnail" style="width: 100px;">
                                                @else
                                                    <span>Aucune image disponible</span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4 border-b border-gray-200">
                                                <a href="{{ route('Annonces.Annonces.edit', $annonce) }}" class="btn btn-warning">Modifier</a>
                                                <form action="{{ route('Annonces.Annonces.destroy', $annonce) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Aucune annonce disponible.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <a href="{{ route('Annonces.Annonces.create') }}"
                        class="relative inline-flex  hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-5 text-center text-base font-semibold text-white outline-none">ajouter</a>
                    </div>
                </div>

    </body>
@endsection
