@extends('admin.layout.navside')

@section('title', 'affichage de produits')

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
        <h1 class=" text-center font-bold text-2xl">DETAILS DE LA PUBLICATION</h1>
    </div>

    <div class="lg:flex 2xl:gap-16 gap-12 max-w-[1065px] mx-auto">
        @if ($produits)
            <div class="mb-4 flex-1 mx-auto">

                <div class="md:max-w-[650px] mx-auto flex-1 xl:space-y-6 space-y-3">

                    <div class="flex items-center py-3 dark:border-gray-600 my-3">

                        <!--  TITRE DU PRODUIT  -->
                        <div
                            class="flex flex-col w-full bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-10">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                    {{ $produits->name }}
                                </h3>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                <h4 class="card-title font-bold"> Date de création </h4>
                                <p class="mb-0">{{ \Carbon\Carbon::parse($produits->created_at)->diffForHumans() }}</p>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mb-4 grid sm:grid-cols-2 gap-3">

                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title "> Type </h4>
                            <p>{{ $produits->type }}</p>
                        </div>
                    </div>
                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title"> conditionnement </h4>
                            <p>{{ $produits->condProd }}</p>
                        </div>
                    </div>

                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title"> format </h4>
                            <p>{{ $produits->formatProd }}</p>
                        </div>
                    </div>
                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title"> Quantité traité</h4>
                            <p>[ {{ $produits->qteProd_min }} - {{ $produits->qteProd_max }} ]</p>
                        </div>
                    </div>
                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title"> Prix par unité </h4>
                            <p>{{ $produits->prix }}</p>
                        </div>
                    </div>
                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title">Capacité de livré</h4>
                            <p>{{ $produits->LivreCapProd }}</p>
                        </div>
                    </div>
                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title"> Zone economique </h4>
                            <p>{{ $produits->zonecoServ }}</p>
                        </div>
                    </div>
                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title"> Ville, Commune</h4>
                            <p> {{ $produits->villeServ }}, {{ $produits->comnServ }}</p>
                        </div>
                    </div>


                </div>
                <div class=" card border shadow-sm rounded-xl flex space-x-5 p-5">
                    <div class="card-body flex-1 p-0">
                        <h4 class="card-title"> Description</h4>
                        <p>{{ $produits->desrip }}</p>
                    </div>
                </div>
            </div>


            <div class="flex-1 items-center justify-center">

                <!-- Slider -->
                <div data-hs-carousel='{
                            "loadingClasses": "opacity-0",
                            "isAutoPlay": true
                        }'
                    class="relative">
                    <div class="hs-carousel relative overflow-hidden w-full min-h-96 bg-white rounded-lg">
                        <div
                            class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                            <div class="hs-carousel-slide">
                                <div class="flex justify-center h-full bg-gray-100 p-6 dark:bg-neutral-900">
                                    <img class="w-full rounded-md"
                                        src="{{ $produits->photoProd1 ? asset($produits->photoProd1) : asset('img/noimg.jpeg') }}"
                                        alt="Jese image">
                                </div>
                            </div>
                            <div class="hs-carousel-slide">
                                <div class="flex justify-center h-full bg-gray-200 p-6 dark:bg-neutral-800">
                                    <img class="w-full rounded-md"
                                        src="{{ $produits->photoProd2 ? asset($produits->photoProd2) : asset('img/noimg.jpeg') }}"
                                        alt="Jese image">
                                </div>
                            </div>
                            <div class="hs-carousel-slide">
                                <div class="flex justify-center h-full bg-gray-300 p-6 dark:bg-neutral-700">
                                    <img class="w-full rounded-md"
                                        src="{{ $produits->photoProd3 ? asset($produits->photoProd3) : asset('img/noimg.jpeg') }}"
                                        alt="Jese image">
                                </div>
                            </div>
                            <div class="hs-carousel-slide">
                                <div class="flex justify-center h-full bg-gray-300 p-6 dark:bg-neutral-700">
                                    <img class="w-full rounded-md"
                                        src="{{ $produits->photoProd4 ? asset($produits->photoProd4) : asset('img/noimg.jpeg') }}"
                                        alt="Jese image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button"
                        class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                        </span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button"
                        class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                        <span class="sr-only">Next</span>
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </span>
                    </button>

                    <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    </div>
                </div>
                <!-- End Slider -->

                <!-- Boutons -->

                <form method="POST" action="{{ route('produit.etat', $produits->id) }}"
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

                <form method="POST" action="{{ route('produit.etat', $produits->id) }}"
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
