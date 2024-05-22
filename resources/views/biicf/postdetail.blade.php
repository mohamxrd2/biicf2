@extends('biicf.layout.navside')

@section('title', 'Details')

@section('content')

    <div class="mb-3">
        <h1 class=" text-center text-slate-600 font-bold text-xl">DETAILS DE LA PUBLICATION</h1>
    </div>


    <div class="grid grid-cols-3 gap-4">
        <div class="lg:col-span-2 col-span-3">
            <div class="max-w-2xl mx-auto">
                <h1 class="my-3 text-2xl font-semibold">{{ $produit->name }}</h1>
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

                        <div class="hs-carousel relative overflow-hidden w-full min-h-screen bg-white rounded-lg">
                            <div
                                class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                                @foreach ([$produit->photoProd1, $produit->photoProd2, $produit->photoProd3, $produit->photoProd4] as $photo)
                                    @if ($photo)
                                        <div class="hs-carousel-slide">
                                            <div class="flex justify-center bg-gray-100  dark:bg-neutral-900">
                                                <img class="w-full h-auto rounded-md  object-cover"
                                                    src="{{ asset($photo) }}" alt="Image">
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
                                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                                @endif
                            @endforeach
                        </div>


                    @endif

                </div>
                <div class="flex flex-col">
                    <p class="text-xl mt-6 text-slate-900 font-bold">Description</p>
                    <div class="mt-3 card border shadow-sm rounded-xl flex space-x-5 p-5">
                        <div class="card-body flex-1 p-0">
                            <p>{{ $produit->desrip }}</p>
                        </div>
                    </div>
                    @if ($produit->condProd)
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title font-bold"> conditionnement </h4>
                                <p>{{ $produit->condProd }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($produit->formatProd)
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title font-bold"> format </h4>
                                <p>{{ $produit->formatProd }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($produit->qteProd_min || $produit->qteProd_max)
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title font-bold"> Quantité traité</h4>
                                <p>[ {{ $produit->qteProd_min }} - {{ $produit->qteProd_max }} ]</p>
                            </div>
                        </div>
                    @endif


                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title font-bold"> Prix par unité </h4>
                            <p>{{ $produit->prix }}</p>
                        </div>
                    </div>

                    @if ($produit->LivreCapProd)
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title font-bold">Capacité de livré</h4>
                                <p>{{ $produit->LivreCapProd }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($produit->qalifServ)
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title font-bold"> Experiance </h4>
                                <p>{{ $produit->qalifServ }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($produit->sepServ)
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title font-bold"> Specialité </h4>
                                <p>{{ $produit->sepServ }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($produit->qteServ)
                        <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                            <div class="card-body flex-1 p-0">
                                <h4 class="card-title font-bold"> Nombre du personnel </h4>
                                <p>{{ $produit->qteServ }}</p>
                            </div>
                        </div>
                    @endif


                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title font-bold"> Ville, Commune</h4>
                            <p> {{ $produit->villeServ }}, {{ $produit->comnServ }}</p>
                        </div>
                    </div>
                    <div class="card border shadow-sm rounded-xl flex space-x-5 p-5 mt-3 mb-6">
                        <div class="card-body flex-1 p-0">
                            <h4 class="card-title font-bold"> Zone economique </h4>
                            <p>{{ $produit->zonecoServ }}</p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col w-full bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="p-4 ">

                            <p class="mt-2 text-gray-500 dark:text-neutral-400">
                            <h4 class="card-title font-bold"> Date de création </h4>
                            <p class="mb-0">{{ \Carbon\Carbon::parse($produit->created_at)->diffForHumans() }}</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 col-span-3">

            <div class="flex flex-col max-w-xl">


                @if ($produit->user_id != $user->id)
                    <div class="mt-4 flex flex-col p-4 bg-gray-50 border border-gray-200 rounded-md">
                        <button type="button" class="w-full mb-3 text-green-800 bg-green-100 rounded-md text-center p-1"
                            id="btnAchatDirect">
                            Achat direct
                        </button>
                        <button type="button" class="w-full text-blue-800 bg-blue-100 rounded-md text-center p-1"
                            id="btnAchatGroup">
                            Achat groupé
                        </button>
                    </div>
                @else
                <div class="mt-4 flex flex-col p-4 bg-gray-50 border border-gray-200 rounded-md">

                    <p class=" text-gray-400 mb-3 text-center">Ce produit vous appartient</p>

                    <a href="#" data-hs-overlay="#hs-delete-{{ $produit->id }}"
                        class="w-full  text-red-800 bg-red-100 rounded-md text-center p-1 ">
                        Supprimé le produit

                    </a>
                    <div id="hs-delete-{{ $produit->id }}"
                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                        <div
                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                            <div
                                class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
                                <div class="absolute top-2 end-2">
                                    <button type="button"
                                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700"
                                        data-hs-overlay="#hs-delete-{{ $produit->id }}">
                                        <span class="sr-only">Close</span>
                                        <svg class="flex-shrink-0 size-4"
                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                                    <!-- Icon -->
                                    <span
                                        class="mb-4 inline-flex justify-center items-center size-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
                                        <svg class="flex-shrink-0 size-5"
                                            xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg>
                                    </span>
                                    <!-- End Icon -->

                                    <h3
                                        class="mb-2 text-2xl font-bold text-gray-800 dark:text-neutral-200">
                                        Supprimé
                                    </h3>
                                    <p class="text-gray-500 dark:text-neutral-500">
                                        Vous etes sur de supprimé le produit ?
                                    </p>

                                    <div class="mt-6 flex justify-center gap-x-4">
                                        <form
                                            action="{{ route('biicf.pubdelete', $produit->id) }}"
                                            method="POST">
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
                </div>
                    
                @endif


                <form action="" class="mt-4 flex flex-col p-4 bg-gray-50 border border-gray-200 rounded-md"
                    id="formAchatDirect" style="display: none;">
                    <h1 class="text-xl text-center mb-3">Achat direct</h1>
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
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            type="submit">
                            Envoyé
                        </button>
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
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            type="submit">
                            Envoyé
                        </button>
                    </div>

                </form>


            </div>



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
    </script>
@endsection
