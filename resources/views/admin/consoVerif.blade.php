@extends('admin.layout.navside')

@section('title', 'affichage de consommations')

@section('content')
    @if (session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-green-200 text-red-800 px-4 py-2 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="mb-3">
        <h1 class=" text-center font-bold text-2xl">DETAILS DE LA CONSOMMATION</h1>
    </div>

    <div class="lg:flex 2xl:gap-16 gap-12 max-w-[1065px] mx-auto">
        @if ($consommations)
            <div class="mb-4 flex-1 mx-auto">

                <div class="md:max-w-[650px] mx-auto flex-1 xl:space-y-6 space-y-3">

                    <div class="flex items-center py-3 dark:border-gray-600 my-3">

                        <!--  TITRE DU PRODUIT  -->
                        <div
                            class="flex flex-col w-full bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-10">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    {{ $consommations->name }}
                                </h3>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                <h4 class="card-title font-bold"> Date de création </h4>
                                <p class="mb-0">{{ \Carbon\Carbon::parse($consommations->created_at)->diffForHumans() }}
                                </p>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mb-4 grid sm:grid-cols-2 gap-3">
                    @if ($consommations->type === 'produits')
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title "> TYPE </h4>
                                <p>{{ $consommations->type }}</p>
                            </div>
                        </div>

                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title"> FORMAT </h4>
                                <p>{{ $consommations->format }}</p>
                            </div>
                        </div>
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title">CONDITIONNEMENT</h4>
                                <p>{{ $consommations->conditionnement }}</p>
                            </div>
                        </div>

                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title"> QUANTITÉ </h4>
                                <p>{{ $consommations->qte }}</p>
                            </div>
                        </div>
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title"> PRIX </h4>
                                <p>{{ $consommations->prix }}</p>
                            </div>
                        </div>
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title"> FRÉQUENCE DE CONSOMMATION </h4>
                                <p>{{ $consommations->qteProd_min }} </p>
                            </div>
                        </div>
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title"> JOUR D'ACHAT</h4>
                                <p> {{ $consommations->jourAch_cons }}</p>
                            </div>
                        </div>

                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title"> ZONE D'ACTIVITÉ </h4>
                                <p>{{ $consommations->zonecoServ }}</p>
                            </div>
                        </div>
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title"> VILLE DE CONSOMMATION</h4>
                                <p> {{ $consommations->villeCons }}</p>
                            </div>
                        </div>
                </div>
            @else
                <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> PRIX HABITUEL</h4>
                        <p>{{ $consommations->prix }}</p>
                    </div>
                </div>
                <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> FRÉQUENCE DE CONSOMMATION </h4>
                        <p>{{ $consommations->qteProd_min }} </p>
                    </div>
                </div>
                <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> JOUR D'ACHAT</h4>
                        <p> {{ $consommations->jourAch_cons }}</p>
                    </div>
                </div>
                <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> QUALIFICATION DE SERVICE</h4>
                        <p> {{ $consommations->jourAch_cons }}</p>
                    </div>
                </div>
                <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> SPÉCIALITÉ</h4>
                        <p> {{ $consommations->jourAch_cons }}</p>
                    </div>
                </div>
                <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> ZONE D'ACTIVITÉ </h4>
                        <p>{{ $consommations->zonecoServ }}</p>
                    </div>
                </div>
                <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> VILLE DE CONSOMMATION</h4>
                        <p> {{ $consommations->villeCons }}</p>
                    </div>
                </div>
        @endif
        <div class=" card border shadow-sm rounded-xl flex space-x-5 p-5">
            <div class="card-body flex-1 p-0">
                <h4 class="card-title"> DESCRIPTION </h4>
                <p>{{ $consommations->description }}</p>
            </div>
        </div>
    </div>


    <div class="flex-1 items-center justify-center">



        <!-- Boutons -->

        <form method="POST" action="{{ route('consommation.consoEtat', $consommations->id) }}"
            class="flex items-center space-x-5 mt-5">
            @csrf <!-- Ajoutez le jeton CSRF pour protéger votre formulaire -->
            @method('POST')

            <!-- Champ pour l'action accepter -->
            <input type="hidden" name="action" value="accepter">

            <!-- Bouton accepter -->
            <button type="submit"
                class="flex items-center space-x-2 border bg-blue-400 px-5 py-2 rounded-md text-black hover:bg-white hover:border hover:border-gray-600">
                <i class="fa-regular fa-heart text-xl"></i>
                <span>accepter</span>
            </button>
        </form>

        <form method="POST" action="{{ route('consommation.consoEtat', $consommations->id) }}"
            class="flex items-center space-x-5 mt-5">
            @csrf <!-- Ajoutez le jeton CSRF pour protéger votre formulaire -->
            @method('POST')

            <!-- Champ pour l'action refuser -->
            <input type="hidden" name="action" value="refuser">

            <!-- Bouton refuser -->
            <button type="submit"
                class="flex items-center space-x-2 border bg-red-400 px-5 py-2 rounded-md text-black hover:bg-white hover:border hover:border-gray-600">
                <i class="fa-solid fa-cart-shopping text-xl"></i>
                <span>refuser</span>
            </button>
        </form>



    </div>
    @endif
    </div>






@endsection
