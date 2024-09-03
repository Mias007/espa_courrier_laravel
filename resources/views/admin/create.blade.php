@extends('admin.admin')
@section('title','creation_courriers')
@section('content')


    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif{{--  pour la signalisation des erreurs de remplissage du formulaire --}}
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">

            <form action="{{ route('courriers.courriers.store') }}" method="POST">
                @csrf


                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">


                            <div>
                                <label for="objet_courrier">Objet Courrier:</label>
                                <input type="text" id="objet_courrier" name="objet_courrier" value="{{ old('objet_courrier') }}" required placeholder="objet courrier"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <div>
                                <label for="nature_courrier">Nature Courrier:</label>
                                <input type="text" id="nature_courrier" name="nature_courrier" value="{{ old('nature_courrier') }}" required placeholder="nature courrier"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <div>
                                <label for="nom_exp">Nom Expéditeur:</label>
                                <input type="text" id="nom_exp" name="nom_exp" value="{{ old('nom_exp') }}" required placeholder="expediteur"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">

                            <div>
                                <label for="adresse_exp">Adresse Expéditeur:</label>
                                <input type="text" id="adresse_exp" name="adresse_exp" value="{{ old('adresse_exp') }}" required placeholder="adresse expediteur"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <div>
                                <label for="date_exp">Date Expédition:</label>
                                <input type="date" id="date_exp" name="date_exp" value="{{ old('date_exp') }}" nullable
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">

                            <div>
                                <label for="nom_dest">Nom Destinataire:</label>
                                <input type="text" id="nom_dest" name="nom_dest" value="{{ old('nom_dest') }}" required placeholder="destinataire"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <div>
                                <label for="adresse_dest">Adresse Destinataire:</label>
                                <input type="text" id="adresse_dest" name="adresse_dest" value="{{ old('adresse_dest') }}" required placeholder="adresse destinataire"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <div>
                                <label for="date_dest">Date d'arrivée:</label>
                                <input type="date" id="date_arrive" name="date_arrive" value="{{ old('date_arrive') }}" nullable
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <div>
                                <div>
                                    <label for="type_courrier">Type de Courrier:</label>
                                    <select id="type_courrier" name="type_courrier" required
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                        <option value="" disabled selected>Choisissez le type de courrier</option>
                                        <option value="entrant" {{ old('type_courrier') == 'entrant' ? 'selected' : '' }}>Entrant</option>
                                        <option value="sortant" {{ old('type_courrier') == 'sortant' ? 'selected' : '' }}>Sortant</option>
                                    </select>
                                </div>
                                <label for="reception">Réception:</label>
                                <select id="reception" name="reception" required>
                                    <option value="reçu" {{ old('reception') == 'reçu' ? 'selected' : '' }}>reçu</option>
                                    <option value="non reçu" {{ old('reception') == 'non reçu' ? 'selected' : '' }}>non reçu</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <div>
                                    <label for="resume">resume:</label>
                                    <input type="text" id="resume" name="resume" value="{{ old('resume') }}" required placeholder="resume"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"  class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Créer
                    </button>
                </div>
            </form>{{-- la formulaire pour la creation de courriers --}}

        </div>
    </div>


</body>


@endsection

