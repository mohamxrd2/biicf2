@extends('biicf.layout.navside')

@section('title', 'Details')

@section('content')


    <div class="max-w-7xl mx-auto p-4 grid lg:grid-cols-5 gap-4 ">
        <!-- Left Side: Image -->
        <div class="lg:h-500px fixed-image lg:col-span-3 col-span-5">
            <div data-hs-carousel='{
                "loadingClasses": "opacity-0",
                "isAutoPlay": true
               }'
                class="relative">
                @php
                    $photoCount = 0;
                    if ($produit->photoProd1) {
                        $photoCount++;
                    }
                    if ($produit->photoProd2) {
                        $photoCount++;
                    }
                    if ($produit->photoProd3) {
                        $photoCount++;
                    }
                    if ($produit->photoProd4) {
                        $photoCount++;
                    }
                @endphp
                @if ($photoCount > 0)

                    <div class="hs-carousel relative overflow-hidden w-full min-h-screen  rounded-lg">
                        <div
                            class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                            @foreach ([$produit->photoProd1, $produit->photoProd2, $produit->photoProd3, $produit->photoProd4] as $photo)
                                @if ($photo)
                                    <div class="hs-carousel-slide">
                                        <div class="flex justify-center bg-gray-100  dark:bg-neutral-900">
                                            <img class="w-full h-auto rounded-md  object-cover" src="{{ asset($photo) }}"
                                                alt="Image">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="flex justify-center h-full bg-gray-100  dark:bg-neutral-900">
                        <img class="w-full h-full  rounded-md" src="{{ asset('img/noimg.jpeg') }}" alt="Image">
                    </div>


                @endif
                @if ($photoCount > 1)

                    <button type="button"
                        class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                        </span>
                        <span class="sr-only">retour</span>
                    </button>
                    <button type="button"
                        class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                        <span class="sr-only">suivant</span>
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                        @foreach ([$produit->photoProd1, $produit->photoProd2, $produit->photoProd3, $produit->photoProd4] as $photo)
                            @if ($photo)
                                <span
                                    class="hs-carousel-active:bg-purple-700 hs-carousel-active:border-purple-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                            @endif
                        @endforeach
                    </div>


                @endif

            </div>
        </div>

        <!-- Right Side: Product Details -->
        <div class="lg:h-500px h-auto overflow-y-auto p-4 lg:col-span-2 col-span-5">
            <h2 class="text-3xl font-semibold mb-2">{{ $produit->name }}</h2>
            <p class="text-sm font-medium text-gray-600 mb-7">{{ $produit->villeServ }}, {{ $produit->comnServ }}</p>
            <p class="text-gray-500 mb-8">
                {{ $produit->desrip }}
            </p>
            <p class="text-4xl font-medium text-purple-600 mb-8" data-price="{{ $produit->prix }}">
                {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                <span class="text-sm text-gray-600 font-medium uppercase">Prix unitaire</span>
            </p>

            <div class="w-full p-3 bg-gray-200 rounded-2xl flex justify-between items-center cursor-pointer mb-4"
                onclick="toggleVisibility()">
                <p class="font-medium text-sm text-gray-700">Caracteristique</p>
                <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            <div id="toggleContent" class="w-full p-3 gap-y-2 hidden mb-4">
                @if ($produit->condProd)
                    <div class="w-full flex justify-between items-center py-4 px-3 border-b-2">
                        <p class="text-sm font-semibold">Conditionnement</p>
                        <p class="text-sm font-medium text-gray-600">{{ $produit->condProd }}</p>
                    </div>
                @endif
                @if ($produit->formatProd)
                    <div class="w-full flex justify-between items-center py-4 px-3 border-b-2">
                        <p class="text-sm font-semibold">Format</p>
                        <p class="text-sm font-medium text-gray-600">{{ $produit->formatProd }}</p>
                    </div>
                @endif
                @if ($produit->qteProd_min || $produit->qteProd_max)
                    <div class="w-full flex justify-between items-center py-4 px-3 border-b-2">
                        <p class="text-sm font-semibold">Quantité traité</p>
                        <p class="text-sm font-medium text-gray-600">[{{ $produit->qteProd_min }} -
                            {{ $produit->qteProd_max }}]</p>
                    </div>
                @endif
                @if ($produit->LivreCapProd)
                    <div class="w-full flex justify-between items-center py-4 px-3 border-b-2">
                        <p class="text-sm font-semibold">Capacité de livré</p>
                        <p class="text-sm font-medium text-gray-600">{{ $produit->LivreCapProd }}</p>
                    </div>
                @endif
                @if ($produit->qalifServ)
                    <div class="w-full flex justify-between items-center py-4 px-3 border-b-2">
                        <p class="text-sm font-semibold">Année d'experiance</p>
                        <p class="text-sm font-medium text-gray-600">{{ $produit->qalifServ }}</p>
                    </div>
                @endif
                @if ($produit->sepServ)
                    <div class="w-full flex justify-between items-center py-4 px-3 border-b-2">
                        <p class="text-sm font-semibold">Specialité</p>
                        <p class="text-sm font-medium text-gray-600">{{ $produit->sepServ }}</p>
                    </div>
                @endif
                @if ($produit->qteServ)
                    <div class="w-full flex justify-between items-center py-4 px-3 border-b-2">
                        <p class="text-sm font-semibold">Nombre de personnel</p>
                        <p class="text-sm font-medium text-gray-600">{{ $produit->qteServ }}</p>
                    </div>
                @endif
            </div>
            @if ($produit->user_id != $user->id)
                <div class="w-full flex">
                    <button class="w-1/2 bg-purple-500 text-white py-2 mr- rounded-xl" id="btnAchatDirect">Achat
                        direct</button>
                    <button class="w-1/2 bg-green-500 text-white py-2 ml-2 rounded-xl" id="btnAchatGroup">Achat
                        groupé</button>
                </div>
            @else
                <button class="w-full bg-red-500 text-white py-2 mr- rounded-xl"
                    data-hs-overlay="#hs-delete-{{ $produit->id }}">Supprimé produit</button>



                <div id="hs-delete-{{ $produit->id }}"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                    <div
                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                        <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
                            <div class="absolute top-2 end-2">
                                <button type="button"
                                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700"
                                    data-hs-overlay="#hs-delete-{{ $produit->id }}">
                                    <span class="sr-only">Close</span>
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18" />
                                        <path d="m6 6 12 12" />
                                    </svg>
                                </button>
                            </div>

                            <div class="p-4 sm:p-10 text-center overflow-y-auto">
                                <!-- Icon -->
                                <span
                                    class="mb-4 inline-flex justify-center items-center size-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </span>
                                <!-- End Icon -->

                                <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-neutral-200">
                                    Supprimé
                                </h3>
                                <p class="text-gray-500 dark:text-neutral-500">
                                    Vous etes sur de supprimé le produit ?
                                </p>

                                <div class="mt-6 flex justify-center gap-x-4">
                                    <form action="{{ route('biicf.pubdelete', $produit->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-white dark:hover:bg-neutral-800">
                                            Supprimer
                                        </button>
                                    </form>
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#hs-delete-{{ $produit->id }}">
                                        Annuler
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form id="formAchatDirect" class="mt-4 flex flex-col p-4 bg-gray-50 border border-gray-200 rounded-md" style="display: none;">
                <h1 class="text-xl text-center mb-3">Achat direct</h1>
                
                <div class="space-y-3 mb-3 w-full">
                    <input type="number" id="quantityInput" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-purple-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Quantité" data-min="{{ $produit->qteProd_min }}" data-max="{{ $produit->qteProd_max }}" oninput="updateTotalPrice()" required>
                </div>
                
                <div class="space-y-3 mb-3 w-full">
                    <input type="text" id="locationInput" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-purple-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Localité" required>
                </div>
                
                <div class="flex justify-between px-4 mb-3 w-full">
                    <p class="font-semibold text-sm text-gray-500">Prix total:</p>
                    <p class="text-sm text-purple-600" id="totalPrice">0 Fcfa</p>
                </div>
                
                <p id="errorMessage" class="text-sm text-center text-red-500 hidden">Erreur</p>
                
                <div class="w-full text-center mt-3">
                    <button type="reset" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-200 text-black hover:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none">Annulé</button>
                    <button type="submit" id="submitButton" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none" disabled>Envoyé</button>
                </div>
            </form>

            <form action="" class="mt-4 flex flex-col p-4 bg-gray-50 border border-gray-200 rounded-md"
                id="formAchatGroup" style="display: none;">
                <h1 class="text-xl text-center mb-3">Achat groupé</h1>
                <div class="max-w-sm space-y-3 mb-3">
                    <input type="number"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Quantité">
                </div>
                <div class="max-w-sm space-y-3 mb-3">
                    <input type="text"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Localité">
                </div>

                <div class="w-full text-center mt-3">
                    <button type="reset"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-200 text-black hover:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none">
                        Annulé
                    </button>

                    <button
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none"
                        type="submit" disabled>
                        Envoyé
                    </button>
                </div>

            </form>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnAchatDirect = document.getElementById('btnAchatDirect');
            const btnAchatGroup = document.getElementById('btnAchatGroup');
            const formAchatDirect = document.getElementById('formAchatDirect');
            const formAchatGroup = document.getElementById('formAchatGroup');

            btnAchatDirect.addEventListener('click', function() {
                if (formAchatDirect.style.display === 'none' || formAchatDirect.style.display === '') {
                    formAchatDirect.style.display = 'block';
                    formAchatGroup.style.display = 'none';
                } else {
                    formAchatDirect.style.display = 'none';
                }
            });

            btnAchatGroup.addEventListener('click', function() {
                if (formAchatGroup.style.display === 'none' || formAchatGroup.style.display === '') {
                    formAchatGroup.style.display = 'block';
                    formAchatDirect.style.display = 'none';
                } else {
                    formAchatGroup.style.display = 'none';
                }
            });
        });

        function toggleVisibility() {
            const contentDiv = document.getElementById('toggleContent');
            contentDiv.classList.toggle('hidden');
        }

        function updateTotalPrice() {
            const quantityInput = document.getElementById('quantityInput');
            const price = parseFloat(document.querySelector('[data-price]').getAttribute('data-price'));
            const minQuantity = parseInt(quantityInput.getAttribute('data-min'));
            const maxQuantity = parseInt(quantityInput.getAttribute('data-max'));
            const quantity = parseInt(quantityInput.value);
            const totalPrice = price * (isNaN(quantity) ? 0 : quantity);
            const totalPriceElement = document.getElementById('totalPrice');
            const errorMessageElement = document.getElementById('errorMessage');
            const submitButton = document.getElementById('submitButton');

            const userBalance = {{ $userWallet->balance }};

            if (isNaN(quantity) || quantity === 0 || quantity < minQuantity || quantity > maxQuantity) {
                errorMessageElement.innerText = `La quantité doit être comprise entre ${minQuantity} et ${maxQuantity}.`;
                errorMessageElement.classList.remove('hidden');
                totalPriceElement.innerText = '0 FCFA';
                submitButton.disabled = true;
            } else if (totalPrice > userBalance) {
                errorMessageElement.innerText =
                    `Le fond est insuffisant. Votre solde est de ${userBalance.toLocaleString()} FCFA.`;
                errorMessageElement.classList.remove('hidden');
                totalPriceElement.innerText = `${totalPrice.toLocaleString()} FCFA`;
                submitButton.disabled = true;
            } else {
                errorMessageElement.classList.add('hidden');
                totalPriceElement.innerText = `${totalPrice.toLocaleString()} FCFA`;
                submitButton.disabled = false;
            }
        }
    </script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the map
            const map = L.map('map').setView([0, 0], 2);

            // Add OSM tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Initialize the geocoder
            const geocoder = L.Control.Geocoder.photon();
            const control = L.Control.geocoder({
                query: '',
                placeholder: 'Rechercher...',
                defaultMarkGeocode: false,
                geocoder: geocoder
            }).addTo(map);

            const input = document.getElementById('locationInput');
            input.addEventListener('input', function() {
                geocoder.geocode(input.value, function(results) {
                    if (results && results.length > 0) {
                        const result = results[0];
                        const bbox = result.bbox;
                        map.fitBounds([
                            [bbox[1], bbox[0]],
                            [bbox[3], bbox[2]]
                        ]);
                    }
                });
            });
        });
    </script>

@endsection
