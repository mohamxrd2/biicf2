@extends('biicf.layout.navside')

@section('title', 'Acceuil')

@section('content')

    <div class="grid grid-cols-3 gap-4">

        <div class="lg:col-span-2 col-span-3">

            <form class="max-w-2xl mx-auto">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative" data-hs-combo-box="">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Recherche de produit ou service..." required data-hs-combo-box-input="" />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chercher</button>

                    </div>
                    


                        <div class="relative z-50 w-full max-h-72 p-1 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
                        style="display: none;" data-hs-combo-box-output="">
    
                        <!-- Utiliser la boucle foreach pour générer les éléments de la liste déroulante -->
                        @foreach ($produits as $produit)
                            <div class="cursor-pointer  py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100"
                                tabindex="{{ $loop->index }}" data-hs-combo-box-output-item="{{ $produit->id }}">
                                <div class="flex">
                                    <img class="w-10 h-10 mr-2 rounded-md" src="{{ $produit->photoProd1 ? asset($produit->photoProd1) : asset('img/noimg.jpeg')}}" alt="">
                                    <div class="flex justify-between items-center w-full">
                                        <span data-hs-combo-box-search-text="{{ $produit->name }} "
                                            data-hs-combo-box-value="{{ $produit->id }}">{{ $produit->name }}</span>
                                        <span class="hidden hs-combo-box-selected:block">
                                            <svg class="flex-shrink-0 size-3.5 text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M20 6 9 17l-5-5"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </form>

        </div>
        <div class="lg:col-span-1 lg:block hidden">
            <div class="flex flex-col ">
                <div class="flex bg-gray-100 border border-gray-200 p-4 rounded-xl mb-3">
                    <img class="h-12 w-12 border-2 border-white rounded-full dark:border-gray-800" src="{{ $user->photo }}"
                        alt="">

                    <div class="flex flex-col ml-3">
                        <p class="font-semibold"> {{ $user->name }}</p>
                        <p class="text-[12px] text-gray-500 "> {{ $user->username }}</p>
                    </div>
                </div>
                <div class="flex flex-col bg-gray-100 border border-gray-200 p-4 rounded-xl">
                    <p class="font-semibold">Thèmes les plus rechercher</p>

                    <div class="space-y-3.5 capitalize text-xs font-normal mt-5 mb-2 text-gray-600 dark:text-white/80">
                        <a href="#">
                            <div class="flex items-center gap-3 p">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> artificial intelligence
                                    </h4>
                                    <div class="mt-0.5"> 1,245,62 post </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="block">
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> Web developers</h4>
                                    <div class="mt-0.5"> 1,624 post </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> Ui Designers</h4>
                                    <div class="mt-0.5"> 820 post </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> affiliate marketing </h4>
                                    <div class="mt-0.5"> 480 post </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> affiliate marketing </h4>
                                    <div class="mt-0.5"> 480 post </div>
                                </div>
                            </div>
                        </a>


                    </div>

                </div>
                <footer class="text-center text-sm text-gray-600 pt-8 pb-11 ">
                    &copy; 2024 BIICF. Tous droits réservés.
                </footer>
            </div>

        </div>
    </div>

@endsection
