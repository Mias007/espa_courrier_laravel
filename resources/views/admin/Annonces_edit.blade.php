@extends('admin.admin')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-4">
            <h1 class="text-blue-500 text-xl font-bold text-center">Admin</h1>
        </div>

        <div class="flex items-center justify-center h-16">
            <img src="{{ asset('image/ESP.jpg') }}" alt="logo" class="h-20">
        </div>

        <nav class="mt-10">
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">Accueil</a>
            <a href="{{ route('courriers.courriers.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">Courriers</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">Aide</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">Paramètres</a>
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center pb-6">
            <h1 class="text-blue-500 text-2xl font-bold">- EDITER ANNONCE -</h1>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <span>Kevin</span>
                    <img src="{{ asset('image/591921.jpg') . '?' . time() }}" alt="AVATAR" class="h-8">
                </div>
            </div>
        </div>

        <!-- Formulaire edit -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('Annonces.Annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 font-bold mb-2">Titre de l'annonce</label>
                    <input type="text" id="titre" name="titre" value="{{ old('titre', $annonce->titre) }}" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="annonce" class="block text-gray-700 font-bold mb-2">Contenu de l'annonce</label>
                    <textarea id="annonce" name="annonce" rows="4" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('annonce', $annonce->annonce) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image de l'annonce</label>
                    @if($annonce->image && file_exists(public_path('storage/' . $annonce->image)))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $annonce->image) }}" alt="Image de l'annonce" class="img-thumbnail" style="width: 150px;">
                        </div>
                    @else
                        <p class="text-gray-500">Aucune image disponible actuellement</p>
                    @endif
                    <input type="file" id="image" name="image" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Mettre à jour l'annonce
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
