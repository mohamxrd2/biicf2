@extends('admin.layout.navside')

@section('title', 'Clients')

@section('content')

    <div class="relative overflow-x-auto sm:rounded-lg">
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <h1 class="font-bold text-2xl">Liste des clients</h1>
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
                        class="block w-80 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Rechercher...">
                </div>
                <a href="{{ route('clients.create') }}"
                    class="inline-flex items-center gap-x-2 px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-static-backdrop-modal">
                    Ajouter
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </a>
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
                    <th scope="col" class="px-6 py-3">Agent</th>
                    <th scope="col" class="px-6 py-3">Statut</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{ $user->photo }}" alt="">
                            <div class="ml-3">
                                <div class="text-base font-semibold">{{ $user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $user->username }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $user->phone }}</td>
                        <td class="px-6 py-4">{{ $user->admin->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-2.5 h-2.5 rounded-full bg-green-500 me-2"></div>
                                <span class="text-sm text-gray-500">En ligne</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <a href="#" data-hs-overlay="#hs-delete" class="mr-2 font-medium text-red-600 dark:text-blue-500">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <div id="hs-delete" class="hs-overlay hidden fixed top-0 start-0 z-[80] overflow-hidden">
                                <div class="absolute inset-0 bg-gray-800 bg-opacity-75" aria-hidden="true"></div>
                                <div class="relative mx-auto mt-10 max-w-lg bg-white rounded-xl shadow-xl">
                                    <!-- Contenu du modal de suppression -->
                                    <div class="p-4">
                                        <div class="text-center">
                                            <span class="inline-flex justify-center w-12 h-12 bg-red-100 rounded-full">
                                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 12L4 12M14 5l6 6m0 0l-6 6m6-6L8 5m6 6V3m0 12v6"></path>
                                                </svg>
                                            </span>
                                            <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Supprimer</h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
                                        </div>
                                        <div class="mt-5 flex justify-center space-x-4">
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-700">Supprimer</button>
                                            </form>
                                            <button type="button"
                                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:bg-gray-200"
                                                data-hs-overlay="#hs-delete">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Message d'aucun résultat trouvé -->
        <div id="noResultMessage" class="h-20 flex justify-center items-center" style="display: none;">
            Aucun résultat trouvé.
        </div>

    </div>
    <div class="mt-5 flex justify-end">
        {{ $users->links() }}
    </div>

    <script src="{{ asset('js/search.js') }}"></script>

@endsection
