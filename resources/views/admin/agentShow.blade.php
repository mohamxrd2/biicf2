@extends('admin.layout.navside')

@section('title', 'Details Agent')

@section('content')


    <div class="w-full p-6 bg-gray-50 border border-gray-200 rounded-lg  dark:bg-neutral-800">


        <div class="flex md:gap-8 gap-4 items-center md:p-8 p-6 md:pb-4">

            <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0">
                <label for="file" class="cursor-pointer">
                    <img id="img" src="{{ $agent->photo }}" class="object-cover w-full h-full rounded-full"
                        alt="" />
                </label>

            </div>



            <div class="flex-1">
                <h3 class="md:text-xl text-base font-semibold text-black dark:text-white">{{ $agent->name }}</h3>
                <p class="text-sm text-blue-600 mt-1 font-normal">{{ '@' . $agent->username }}</p>
            </div>


        </div>
    </div>

    <div class="grid grid-cols-3 gap-4 my-4">
        <div class="col-span-2 p-4 bg-white border border-gray-200 rounded-md">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <div
                    class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                    <div>
                        <h1 class="font-bold text-md">Liste des clients</h1>
                    </div>
                    <div class="flex items-center">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mr-2">
                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="searchInput" onkeyup="searchTable()"
                                class="block w-80 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Rechercher...">
                        </div>

                    </div>
                </div>

                @if (session('success'))
                    <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full mt-5 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nom</th>
                            <th scope="col" class="px-6 py-3">Téléphone</th>
                            <th scope="col" class="px-6 py-3">Statut</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($userCount == 0)

                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">
                                <div class="flex flex-col justify-center items-center h-40">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        class="w-12 h-12 text-gray-500 dark:text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <h1 class="text-xl text-gray-500 dark:text-gray-400">Aucun utilisateur</h1>
                                </div>
                            </td>
                        </tr>

                        @else

                        @foreach ($users as $user)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="{{ $user->photo }}" alt="">
                                    <div class="ml-3">
                                        <div class="text-base font-semibold">{{ $user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $user->username }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">{{ $user->phone }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-2.5 h-2.5 rounded-full bg-green-500 me-2"></div>
                                        <span class="text-sm text-gray-500">En ligne</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex">
                                        <a href="#" data-hs-overlay="#hs-delete"
                                            class="mr-2 font-medium text-red-600 dark:text-blue-500">
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach


                
                      
                            
                        @endif

                        



                    </tbody>
                </table>

                <!-- Message d'aucun résultat trouvé -->
                <div id="noResultMessage" class="h-20 flex justify-center items-center" style="display: none;">
                    Aucun résultat trouvé.
                </div>

            </div>
            <div class="my-5 flex justify-end">

            </div>
        </div>
        <div class="col-span-1 ">
            <div class="flex flex-col p-4 bg-gray-50 border border-gray-200 rounded-md">
                <div class="mb-3">
                    <h1 class="font-bold text-md">Information personnel</h1>
                </div>
                <div class="mb-3">
                    <p class="font-semibold text-sm">Nom et pronom</p>
                    <p class="text-sm text-gray-400">{{ $agent->name }}</p>
                </div>
                <div class="mb-3">
                    <p class="font-semibold text-sm">Numero de téléphone</p>
                    <p class="text-sm text-gray-400">{{ $agent->phonenumber }}</p>
                </div>

                <div class="mb-3">
                    <p class="font-semibold text-sm">Nombre de client enregistré</p>
                    <p class="text-sm text-gray-400">{{ $userCount }}</p>
                </div>

                <a href="#" class="w-full border border-red-600 bg-red-200 rounded-md text-center p-1 text-red-600">
                    Supprimé l'agent

                </a>





            </div>

        </div>
    </div>





@endsection
