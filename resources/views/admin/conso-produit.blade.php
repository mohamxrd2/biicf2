@extends('admin.layout.navside')

@section('title', 'consommation')

@section('content')


<div class=" relative overflow-x-auto  sm:rounded-lg">
    <div
        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <div>
            <select
                class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <!-- Dropdown menu -->

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
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Type de fournisseur
                </th>
                <th scope="col" class="px-6 py-3">
                    conditionnement de consommation
                </th>
                <th scope="col" class="px-6 py-3">
                    Format
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantité
                </th>
                <th scope="col" class="px-6 py-3">
                    Prix de consommation
                </th>
                <th scope="col" class="px-6 py-3">
                    Fréquence de consommation
                </th>
                <th scope="col" class="px-6 py-3">
                    Jour d'achat
                </th>
                <th scope="col" class="px-6 py-3">
                    Zone d'activité
                </th>
                <th scope="col" class="px-6 py-3">
                    Ville de consommation
                </th>

                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($consommations as $consommation)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $consommation->name }}</div>
                                <div class="font-normal text-gray-500">{{ $consommation->username }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->cond_cons }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->format_cons }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->qte }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->prix_cons }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->frqce_conse }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->jourAch_cons }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->qualif_serv }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->specialite }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->description }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->zoneAct }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="mb-0">{{ $consommation->villeCons }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                </a>

                                <button data-hs-overlay="#hs-delete"
                                    class="agent-link last-of-type:font-medium text-red-600 dark:text-blue-500 hover:underline mr-2 delete-agent-link">
                                    {{-- <form action="{{ route('admin.destroy', $agent->id ) }}" method="POST"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-white dark:hover:bg-neutral-800"
                                            type="submit" id="confirmDeleteBtn">Supprimer{{ $agent->id }}</button>
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

        </tbody>
    </table>


    {{-- <div id="hs-delete"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700"
                        data-hs-overlay="#hs-delete">
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
                        Vous etes sur de supprimé le compte de l'agnt ?
                    </p>

                    <div class="mt-6 flex justify-center gap-x-4">
                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-white dark:hover:bg-neutral-800"
                            href="#">
                            Supprimé
                        </a>
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-delete">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</div>


@endsection
