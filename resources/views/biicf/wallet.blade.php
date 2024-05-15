@extends('biicf.layout.navside')

@section('title', 'Porte-feuille')

@section('content')


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

    <div class="grid grid-cols-3 gap-4">

        <div class="lg:col-span-2 col-span-3">

            <div class="bg-blue-500 rounded-2xl p-6 flex flex-col justify-between h-40">
                <p class="text-md text-slate-100">Mon compte</p>

                <div class="flex justify-between items-center">
                    <p class="text-3xl text-white font-bold"> {{ $userWallet->balance }} FCFA </p>

                </div>

            </div>
        </div>
        <div class="lg:col-span-1 col-span-3">
            <div class="w-full h-full p-5 bg-white border flex items-center rounded-2xl hover:bg-gray-50 mb-4 cursor-pointer"
                data-hs-overlay="#monney-send">

                <div class="flex flex-col">
                    <p class="font-bold  mb-3">Envoyé de l'argent</p>
                    <div class="flex items-center">
                        <div class="rounded-full w-8 h-8 bg-gray-200 flex items-center justify-center mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>

                        <div class="flex -space-x-4 rtl:space-x-reverse">

                            @if ($userCount == 0)

                                <p class="text-gray-600">Aucun client</p>
                            @else
                                @foreach ($users->take(5) as $user)
                                    <img class="h-12 w-12 border-2 border-white rounded-full dark:border-gray-800"
                                        src="{{ $user->photo }}" alt="">
                                @endforeach

                            @endif

                        </div>

                    </div>

                </div>

            </div>
            <form action="{{ route('biicf.send') }}" method="POST">
                @csrf
                <div id="monney-send"
                    class="hs-overlay h-auto hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                    <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">


                        <div
                            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                <h3 class="font-bold text-gray-800 dark:text-white">
                                    Envoyé de l'argent
                                </h3>
                                <button type="button"
                                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                                    data-hs-overlay="#monney-send">
                                    <span class="sr-only">Close</span>
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-4 overflow-y-auto">

                                <div class=" w-full mb-3">

                                    <input type="hidden" id="user_id" name="user_id" value="">

                                    <div class="relative" data-hs-combo-box="">
                                        <div class="relative">
                                            <input
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                type="text" placeholder="Entrez le nom du client"
                                                data-hs-combo-box-input="">

                                        </div>
                                        <div class="relative z-50 w-full max-h-72 p-1 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
                                            style="display: none;" data-hs-combo-box-output="">

                                            <!-- Utiliser la boucle foreach pour générer les éléments de la liste déroulante -->
                                            @foreach ($users as $user)
                                                <div class="cursor-pointer  py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100"
                                                    tabindex="{{ $loop->index }}"
                                                    data-hs-combo-box-output-item="{{ $user->id }}">
                                                    <div class="flex">
                                                        <img class="w-5 h-5 mr-2 rounded-full" src="{{ $user->photo }}"
                                                            alt="">
                                                        <div class="flex justify-between items-center w-full">
                                                            <span data-hs-combo-box-search-text="{{ $user->username }} "
                                                                data-hs-combo-box-value="{{ $user->id }}">{{ $user->username }}({{ $user->name }})</span>
                                                            <span class="hidden hs-combo-box-selected:block">
                                                                <svg class="flex-shrink-0 size-3.5 text-blue-600"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M20 6 9 17l-5-5"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>


                                <div class="space-y-3 w-full mb-3">
                                    <input type="number" name="amount" id="floating_prix"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Entrez la somme" />
                                </div>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                <button type="reset"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                                    data-hs-overlay="#monney-send">
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Envoyé
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="flex justify-between items-center my-6">
        <p class="text-2xl font-semibold">Transactions</p>


        <div class="flex items-center">

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mr-2">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="searchInput" onkeyup="searchTable()"
                    class="block w-80 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Rechercher...">
            </div>


        </div>



    </div>

    @if ($transacCount == 0)
        <hr>
        <div class="w-full h-80 flex justify-center items-center">

            <div class="flex flex-col justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-12 h-12 text-gray-500 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <h1 class="text-xl text-gray-500 dark:text-gray-400">Aucune transaction</h1>
            </div>
        </div>
    @else
        @foreach ($transactions as $transaction)
        @if (
         
            $transaction->type == 'Reception' && $transaction->receiver_user_id == $userId ||
            $transaction->type == 'Envoie' && $transaction->sender_user_id == $userId
        )
                <div class="w-full flex items-center hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    @if ($transaction->type == 'Depot')
                        <div
                            class="flex items-center justify-center p-1 rounded-md w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                            </svg>

                        </div>
                    @elseif ($transaction->type == 'Reception' && $transaction->receiver_user_id == $userId)
                        <div
                            class="flex items-center justify-center p-1 rounded-md w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                            </svg>

                        </div>
                    @elseif ($transaction->type == 'Envoie' && $transaction->sender_user_id == $userId)
                        <div
                            class="flex items-center justify-center p-1 rounded-md w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>

                        </div>
                    @endif

                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                @if ($transaction->type == 'Depot')
                                    <h4 class="font-semibold dark:text-white">Rechargement</h4>
                                @elseif ($transaction->type == 'Envoie' && $transaction->sender_user_id == $userId)
                                    <h4 class="font-semibold dark:text-white">Envoyé à

                                        @if ($transaction->receiverUser)
                                            {{ $transaction->receiverUser->name }}
                                       
                                        @endif


                                    </h4>
                                @elseif ($transaction->type == 'Reception' && $transaction->receiver_user_id == $userId)
                                    <h4 class="font-semibold dark:text-white">Reçu de

                                        @if ($transaction->senderAdmin)
                                            {{ $transaction->senderAdmin->name }}
                                    </h4>
                                @elseif($transaction->receiverUser)
                                    {{ $transaction->receiverUser->name }}
                                @endif
            @endif
            <ul class="flex">
                @if ($transaction->type == 'Envoie' && $transaction->sender_user_id == $userId)
                    <li class="mr-2 text-gray-600 dark:text-neutral-500">Envoyé le</li>
                    <li class="text-gray-600 dark:text-neutral-500">
                        {{ $transaction->created_at->translatedFormat('j F Y \à H\hi') }}
                    </li>
                @elseif (($transaction->type == 'Reception' && $transaction->receiver_user_id == $userId) || $transaction->type == 'Depot')
                    <li class="mr-2 text-gray-600 dark:text-neutral-500">Reçu le</li>
                    <li class="text-gray-600 dark:text-neutral-500">
                        {{ $transaction->created_at->translatedFormat('j F Y \à H\hi') }}
                    </li>
                @endif

            </ul>
            </div>

            <div>
                @if (($transaction->type == 'Depot' || $transaction->type == 'Reception') && $transaction->receiver_user_id == $userId)
                    <p class="text-md text-green-400 font-bold dark:text-white">+
                        {{ $transaction->amount }} FCFA</p>
                @elseif ($transaction->type == 'Envoie' && $transaction->sender_user_id == $userId)
                    <p class="text-md text-red-600  font-bold dark:text-white">-
                        {{ $transaction->amount }} FCFA</p>
                @endif
            </div>
            </div>
            </div>
            <!-- End Col -->
            </div>
        @endif
    @endforeach
    <div class="my-5 flex justify-end">
        {{ $transactions->links() }}
    </div>


    @endif


    <script>
        document.addEventListener('DOMContentLoaded', function() {


            const comboBoxItems2 = document.querySelectorAll('[data-hs-combo-box-output-item]');
            const userIdInput = document.getElementById('user_id');

            comboBoxItems2.forEach(function(item) {
                item.addEventListener('click', function() {
                    const userId = item.getAttribute('data-hs-combo-box-output-item');
                    userIdInput.value = userId;
                });
            });
        });
    </script>

@endsection
