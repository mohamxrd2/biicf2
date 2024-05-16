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

                        <div class="hs-carousel relative overflow-hidden w-full min-h-96 bg-white rounded-lg">
                            <div
                                class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                                @foreach ([$produit->photoProd1, $produit->photoProd2, $produit->photoProd3, $produit->photoProd4] as $photo)
                                    @if ($photo)
                                        <div class="hs-carousel-slide">
                                            <div class="flex justify-center h-full bg-gray-100  dark:bg-neutral-900">
                                                <img class="w-full h-full  rounded-md" src="{{ asset($photo) }}"
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
                            <div class="p-4 md:p-10">
                               
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                <h4 class="card-title font-bold"> Date de création </h4>
                                <p class="mb-0">{{ \Carbon\Carbon::parse($produit->created_at)->diffForHumans() }}</p>
                                </p>
                            </div>
                        </div>
                </div>
                </div>
            </div>

        </div>

    </div>



@endsection
