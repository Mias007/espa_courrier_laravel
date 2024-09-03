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
                <a href="#" id="navAccueil"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                    Accueil
                </a>

                <a href="#" id="navCourriers"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                    Courriers
                </a>

                <a href="#" id="navAnnonces"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                    Annonces
                </a>

                <a href="#"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                    Aide
                </a>
                <a href="#"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">
                    Paramètre
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

            <!-- Sections -->
            <!-- Section Courriers -->
            <div id="sectionCourriers" class="hidden">
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    Type de Courrier
                                </th>
                                <!-- Other table headers -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courriers as $courrier)
                                @if($courrier)
                                    <tr>
                                        <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                            {{ $courrier->type_courrier }}
                                        </td>
                                        <!-- Other table data -->
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('courriers.courriers.create') }}"
                   class="relative inline-flex hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-5 text-center text-base font-semibold text-white outline-none">Ajouter</a>
            </div>

            <!-- Section Annonces -->
            <div id="sectionAnnonces">
                <h2 class="text-blue-500 text-2xl font-bold mb-4">Liste des annonces</h2>
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    Titre
                                </th>
                                <!-- Other table headers -->
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($Annonces) && $Annonces->isNotEmpty())
                                @foreach($Annonces as $annonce)
                                    <tr>
                                        <td class="py-3 px-4 border-b border-gray-200">{{ $annonce->titre }}</td>
                                        <!-- Other table data -->
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
                       class="relative inline-flex hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-5 text-center text-base font-semibold text-white outline-none">Ajouter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript pour basculer entre les sections -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Afficher la section "Annonces" par défaut
            document.getElementById('sectionAnnonces').style.display = 'block';
            document.getElementById('sectionCourriers').style.display = 'none';

            // Ajouter des écouteurs d'événements pour les liens de navigation
            document.getElementById('navCourriers').addEventListener('click', function (event) {
                event.preventDefault();
                document.getElementById('sectionCourriers').style.display = 'block';
                document.getElementById('sectionAnnonces').style.display = 'none';
            });

            document.getElementById('navAnnonces').addEventListener('click', function (event) {
                event.preventDefault();
                document.getElementById('sectionAnnonces').style.display = 'block';
                document.getElementById('sectionCourriers').style.display = 'none';
            });
        });
    </script>
</body>
@endsection
