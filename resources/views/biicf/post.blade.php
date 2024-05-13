@extends('biicf.layout.navside')

@section('title', 'Publication')

@section('content')


    <div class=" relative overflow-x-auto  sm:rounded-lg">
        @if (session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-200 text-red-800 px-4 py-2 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">

            <div>
                <h1 class="bold" style="font-size: 24px;">Liste des publications</h1>
            </div>

            <div class="flex items-center">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mr-2">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput" onkeyup="searchTable()"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Rechercher...">
                </div>
                <button type="button"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-static-backdrop-modal">
                    Ajouter

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </button>

                <div id="hs-static-backdrop-modal"
                    class="hs-overlay size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static] @if ($errors->any()) open opened @else hidden @endif bg-black bg-opacity-50"
                    data-hs-overlay-keyboard="false" aria-overlay="true" tabindex="-1">

                    <div
                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">

                        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">



                            <form action="{{ route('admin.client.storePub', ['username' => $user->username]) }}"
                                method="POST">
                                @csrf
                                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto form1">

                                    <div class="flex justify-between items-center py-3 px-4 border-b">
                                        <h3 class="font-bold text-gray-800">
                                            Ajouter des publications
                                        </h3>

                                        <button type="button"
                                            class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-overlay="#hs-static-backdrop-modal">
                                            <span class="sr-only">Close</span>
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    {{-- publication --}}
                                    <div class="p-4 overflow-y-auto">


                                        <div class="max-w-md mx-auto">
                                            <div class="gap-y-6">
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                                <div class="relative z-0 w-full mb-5 group">
                                                    <select name="type" id="choose"
                                                        class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                        <option value="" disabled selected>Choisir le
                                                            type</option>
                                                        <option value="produits">Produit</option>
                                                        <option value="services">Service</option>
                                                    </select>

                                                </div>
                                                {{-- les inputs suivants sont pour les produits --}}
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="text" name="name" id="floating_first_name"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=" Nom du produit ou service " />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="text" name="conditionnement" id="floating_cond"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="conditionnement" />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="text" name="format" id="floating_format"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="format du produit " />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="number" name="qteProd_min" id="floating_qtemin"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=" Quantité Minimale " />
                                                </div>

                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="number" name="qteProd_max" id="floating_qtemax"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=" Quantité Maxiamle" />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="number" name="prix" id="floating_prix"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="Prix" />
                                                </div>
                                                <div class="relative z-0 w-full mb-5 group">
                                                    <select name="livraison" id="floating_livraison"
                                                        class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                        <option value="" disabled selected>Capacité à
                                                            livrer</option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>

                                                </div>



                                                {{-- les inputs suivants sont pour les services --}}



                                                <div class="relative z-0 w-full mb-5 group">
                                                    <select name="qualification" id="floating_qualification"
                                                        class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                        <option value="" disabled selected>Experiance dans le
                                                            domaine</option>
                                                        <option value="Moins de 1 an">Moins de 1 an</option>
                                                        <option value="De 1 à 5 ans">De 1 à 5 ans</option>
                                                        <option value="De 5 à 10 ans">De 5 à 10 ans</option>
                                                        <option value="Plus de 10 ans">Plus de 10 ans</option>
                                                    </select>

                                                </div>

                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="text" name="specialite" id="floating_specialite"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="Spécialite " />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="number" name="qte_service" id="floating_qte_service"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="Nombre de personnel " />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="text" name="ville" id="floating_ville"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="Ville " />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="text" name="commune" id="floating_commune"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="Commune " />
                                                </div>
                                                <div class="space-y-3 w-full mb-3">
                                                    <input type="text" name="zoneco" id="floating_zoneco"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=" Zone économique" />
                                                </div>
                                                <div class="relative z-0 w-full mb-5 group">
                                                    <textarea id="floating_description" name="description"
                                                        class="py-3 px-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        rows="3" placeholder="Description de la publication"></textarea>
                                                </div>
                                                <div class="relative z-0 w-full mb-5 group">
                                                    <div class="flex items-center justify-center w-full">
                                                        <label for="dropzone-file" id="floating_photo" name="photo"
                                                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                </svg>
                                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    <span class="font-semibold">Click to
                                                                        upload</span> or drag and drop
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                            </div>
                                                            <input id="dropzone-file" type="file" class="hidden" />
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                        <button type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-overlay="#hs-static-backdrop-modal">
                                            Fermer
                                        </button>
                                        <button type="submit"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                            Ajouter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <div class="flex flex-col mt-4">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Nom & image</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Quantité traité</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Prix</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">John Brown</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">45</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">New York No. 1 Lake Park</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">45</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                          <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                        </td>
                      </tr>
          
                     
          
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

    </div>



    <script src="{{ asset('js/search2.js') }}"></script>
    <script src="{{ asset('js/affichage_champs.js') }}"></script>
@endsection
