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
                <h1 class="text-blue-500 text-2xl font-bold">-AJOUTER UNE ANNONCE-</h1>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <span>Kevin</span>
                        <img src="{{ asset('image\591921.jpg') . '?' . time() }}" alt="AVATAR" class="h-8">
                    </div>
                </div>
            </div>

            <!-- Formulaire de création d'annonce -->
            <div class="bg-white shadow-md rounded-lg p-8">
                <form action="{{ route('Annonces.Annonces.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Champ titre -->
                    <div class="mb-4">
                        <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre :</label>
                        <input type="text" name="titre" id="titre"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Titre de l'annonce" required>
                    </div>

                    <!-- Champ annonce -->
                    <div class="mb-4">
                        <label for="annonce" class="block text-gray-700 text-sm font-bold mb-2">Annonce :</label>
                        <textarea name="annonce" id="annonce" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Contenu de l'annonce" required></textarea>
                    </div>

                    <!-- Champ image -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image :</label>
                        <input type="file" name="image" id="image"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            accept="image/*">
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="flex items-center justify-between">

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Ajouter l'annonce
                        </button>
                        <a href="{{ route('Annonces.Annonces.index') }}"
                            class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

@endsection
