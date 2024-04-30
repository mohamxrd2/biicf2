@extends('admin.layout.navside')

@section('title', 'Porte-feuille')

@section('content')

    <div class="grid grid-cols-3 gap-4">
        <div class="lg:col-span-2 col-span-3">
            <div class="bg-black rounded-2xl p-6 flex flex-col justify-between h-40">
                <p class="text-md text-slate-400">Mon compte</p>

                <div class="flex justify-between items-center">
                    <p class="text-3xl text-white font-bold"> {{ $adminWallet->balance }} FCFA</p>

                    <div>
                        <a href="" class="bg-white bordertext-sm py-2 px-3 rounded-2xl flex items-center">

                            <svg class="flex-shrink-0 size-5 text-gray-600 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                            </svg>

                            Déposer
                        </a>
                    </div>
                </div>

            </div>
            <div class="flex justify-between items-center my-6">
                <p class="text-2xl font-bold">Rapport de finance</p>

                <select name="" id="" class="px-3 py-1 rounded-2xl">
                    <option value="">Mois</option>
                    <option value="Année">Année</option>
                    <option value="">Depuis toujour</option>
                </select>

            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="lg:col-span-1 col-span-3">
                    <div class="rounded-2xl p-6 flex flex-col justify-between  h-32 bg-green-100">

                        <p class="text-md text-slate-400">Total envoyé</p>

                        <p class="text-xl text-black font-bold"> 5,234,234 FCFA</p>


                    </div>
                </div>
                <div class="lg:col-span-1 col-span-3">
                    <div class="bg-black rounded-2xl p-6 flex flex-col justify-between  h-32 bg-orange-100">
                        <p class="text-md text-slate-400">Total reçu</p>
                        <div>
                            <p class="text-xl text-black font-bold"> 5,234,234 FCFA</p>
                        </div>

                    </div>
                </div>
                <div class="lg:col-span-1 col-span-3">
                    <div class="bg-black rounded-2xl p-6 flex flex-col justify-between  h-32 bg-violet-100">
                        <p class="text-md text-slate-400">Total sur le compte</p>
                        <div>
                            <p class="text-xl text-black font-bold"> 5,234,234 FCFA</p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="flex justify-between items-center my-6">
                <p class="text-2xl font-bold">Transactions</p>

                <select name="" id="" class="px-3 py-1 rounded-2xl">
                    <option value="">Mois</option>
                    <option value="Année">Année</option>
                    <option value="">Depuis toujour</option>
                </select>

            </div>
            <div>
                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7h10v10" />
                            <path d="M7 17 17 7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Envoyé
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <p class="text-md text-red-600 font-bold dark:text-white">
                                    -100 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>

                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="we63v ieehs" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M17 7 7 17" />
                            <path d="M17 17H7V7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Reçu
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div class="flex flex-col flex-end">
                                <p class="text-md text-green-400 font-bold dark:text-white">
                                    +470 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>
                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7h10v10" />
                            <path d="M7 17 17 7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Envoyé
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <p class="text-md text-red-600 font-bold dark:text-white">
                                    -100 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>

                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="we63v ieehs" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 7 7 17" />
                            <path d="M17 17H7V7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Reçu
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div class="flex flex-col flex-end">
                                <p class="text-md text-green-400 font-bold dark:text-white">
                                    +470 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>
                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7h10v10" />
                            <path d="M7 17 17 7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Envoyé
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <p class="text-md text-red-600 font-bold dark:text-white">
                                    -100 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>

                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="we63v ieehs" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 7 7 17" />
                            <path d="M17 17H7V7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Reçu
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div class="flex flex-col flex-end">
                                <p class="text-md text-green-400 font-bold dark:text-white">
                                    +470 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>
                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7h10v10" />
                            <path d="M7 17 17 7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Envoyé
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <p class="text-md text-red-600 font-bold dark:text-white">
                                    -100 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>

                <a class="w-full flex hover:bg-gray-100 rounded-xl p-4 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="#">
                    <!-- Icon -->
                    <div
                        class="flex items-center justify-center rounded-full w-10 h-10 mr-2 bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
                        <svg class="we63v ieehs" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 7 7 17" />
                            <path d="M17 17H7V7" />
                        </svg>
                    </div>
                    <!-- End Icon -->

                    <div class="w-full">
                        <div class="flex  justify-between items-center">
                            <div>
                                <h4 class="font-medium dark:text-white">
                                    Costa Quinn
                                </h4>
                                <ul class="flex">
                                    <li class="mr-2 dark:before:bg-neutral-500 dark:text-neutral-500">
                                        Reçu
                                    </li>
                                    <li
                                        class="jsblq relative tvwcs i9sl6 w5x42 ihnzr snz3x f1y89 durcc zc4gc pod66 k29qu txceg oauyv lsz3i dark:before:bg-neutral-500 dark:text-neutral-500">
                                        07:41 PM
                                    </li>
                                </ul>
                            </div>

                            <div class="flex flex-col flex-end">
                                <p class="text-md text-green-400 font-bold dark:text-white">
                                    +470 USD
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </a>
            </div>

        </div>
        <div class="lg:col-span-1 col-span-3 ">

            <div>
                <a href="" class="w-full p-5 bg-white border flex items-center rounded-2xl hover:bg-gray-50 mb-4">

                    <div class="flex flex-col">
                        <p class="font-bold  mb-3">Envoyé a un agent</p>
                        <div class="flex items-center">
                            <div class="rounded-full w-8 h-8 bg-gray-200 flex items-center justify-center mr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>

                            <div class="flex -space-x-4 rtl:space-x-reverse">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-3.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-4.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-5.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-2.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-3.jpg" alt="">
                            </div>

                        </div>

                    </div>

                </a>
                <a href="" class="w-full p-5 bg-white border flex items-center rounded-2xl hover:bg-gray-50 mb-4">

                    <div class="flex flex-col">
                        <p class="font-bold  mb-3">Envoyé a un client</p>
                        <div class="flex items-center">
                            <div class="rounded-full w-8 h-8 bg-gray-200 flex items-center justify-center mr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>

                            <div class="flex -space-x-4 rtl:space-x-reverse">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-3.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-4.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-5.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-2.jpg" alt="">
                                <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-3.jpg" alt="">
                            </div>

                        </div>

                    </div>

                </a>
            </div>

        </div>

    </div>

@endsection
