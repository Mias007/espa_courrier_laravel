@extends('user.layout')

@section('content')
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex min-h-screen">
        <!-- Barre latérale -->
        <aside class="w-64 bg-white shadow-lg">
            <!-- Contenu de la barre latérale -->
            <div class="flex items-center justify-center h-16">
                <img src="image\ESP.jpg" alt="Logo" class="h-16">
                <span class="text-blue-500 text-lg font-semibold"></span>
            </div>
            <nav class="mt-10">
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">Accueil</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">Aide</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-100 hover:text-blue-700">Paramètre</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <!-- Contenu avec les résultats filtrés et triés -->
            <div class="p-6">
                <input type="text" id="search-input" placeholder="Recherche..." class="border px-4 py-2 mb-4">

                <div class="overflow-x-auto bg-white shadow-md rounded-lg">

                    <table class="min-w-full bg-white" id="courriers-table">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(0)">
                                        Type de courrier
                                    </th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(1)">
                                        Objet courrier
                                    </th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(2)">
                                        Nature courrier
                                    </th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(3)">Expéditeur</th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(4)">Destinataire</th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(5)">Adresse exp</th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(6)">Adresse dest</th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(7)">Date exp</th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(8)">Date arrivée</th>
                                <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase cursor-pointer" onclick="sortTable(9)">Réception</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courriers as $courrier)
                                @if($courrier) <!-- Vérification que l'objet $courrier est valide -->
                                    <tr>
                                        <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200">
                                            {{ $courrier->type_courrier }}</td>
                                            <td class="font-sans hover:font-serif py-3 px-4 border-b border-gray-200 tooltip" data-resume="{{ Str::limit($courrier->resume, 100) }}">
                                                {{ $courrier->objet_courrier }}
                                                <span class="tooltiptext">{{ Str::limit($courrier->resume, 100) }}</span>
                                            </td>

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
                        </tbody>
                    </table>
                    <!-- Liens de pagination -->
                    <div class="mt-4">
                        {{ $courriers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Scripts JavaScript pour la recherche et le tri -->
    <script>
        // Fonction de recherche
        document.getElementById('search-input').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var table = document.getElementById('courriers-table');
            var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var found = false;
                for (var j = 0; j < cells.length; j++) {
                    if (cells[j].innerText.toLowerCase().indexOf(input) > -1) {
                        found = true;
                        break;
                    }
                }
                rows[i].style.display = found ? '' : 'none';
            }
        });

        // Fonction de tri
        function sortTable(columnIndex) {
            var table = document.getElementById('courriers-table');
            var rows = Array.from(table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'));
            var ascending = true;

            rows.sort(function(a, b) {
                var aText = a.getElementsByTagName('td')[columnIndex].innerText;
                var bText = b.getElementsByTagName('td')[columnIndex].innerText;

                return ascending ? aText.localeCompare(bText) : bText.localeCompare(aText);
            });

            ascending = !ascending;

            rows.forEach(function(row) {
                table.getElementsByTagName('tbody')[0].appendChild(row);
            });
        }
    </script>
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

                .tooltip .tooltiptext {
            visibility: hidden;
            min-width: 250px; /* Largeur minimale ajustée */
            max-width: 350px; /* Largeur maximale ajustée */
            background-color: rgba(1, 27, 43, 0.445);
            color: #ffffff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 10px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            word-wrap: break-word;
            white-space: normal;
        }


        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

    </style>

</body>
@endsection
