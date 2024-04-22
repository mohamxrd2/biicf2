@extends('admin.layout.navside')

@section('title', 'Produits')


@section('content')


    <div class=" relative overflow-x-auto  sm:rounded-lg">
        <div id="resultsContainer"
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <h1 class="bold" style="font-size: 24px;">Liste des @yield('title')</h1>

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
                    <input type="text" id="table-search-users"
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




            </div>

        </div>


        <table class="w-full mt-5 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        nom & photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix
                    </th>
                    <th scope="col" class="px-6 py-3">
                        description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        speticialité
                    </th>
                    <th scope="col" class="px-6 py-3">
                        quantite du service
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix du service
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Zone economique
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ville
                    </th>
                    <th scope="col" class="px-6 py-3">
                        commune
                    </th>
                    <th scope="col" class="px-6 py-3">
                        utilisateur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        date de creation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{ $produit->photo }}" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $produit->name }}</div>
                                <div class="font-normal text-gray-500">{{ $produit->username }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->formatProd }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->qteProd_min }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->qteProd_max }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->prix }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->qalifServ }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->qteServ }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->zonecoServ }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->villeServ }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->user_id }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $produit->created_at }}</p>
                        </td>


                        <td class="px-6 py-4">
                            <div class="flex">
                                <button data-hs-overlay="#hs-delete"
                                    class="agent-link last-of-type:font-medium text-red-600 dark:text-blue-500 hover:underline mr-2 delete-agent-link">
                                    {{-- <form action="{{ route('admin.destroy', $produit->id ) }}" method="POST" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-white dark:hover:bg-neutral-800" type="submit" id="confirmDeleteBtn">Supprimer{{ $produit->id }}</button>
                                </form> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{-- {{ $produits->links() }} --}}
            </tbody>

        </table>


        {{-- @include('admin.components.delete') --}}


    </div>



@endsection
