@extends('admin.layout.navside')

@section('title', 'Dashboard')

@section('content')


<div class="lg:flex 2xl:gap-6 gap-6  mx-auto" id="js-oversized">

    <div class="flex-1 mx-auto  ">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">


            @include('admin.components.chartcard', [
                'bgcolor' => 'black',
                'title' => 'Budget',
                'tooltip' => 'Budjet totale',
                'amount' => '5,572,540 FCFA',
                'chart' => '12.5',
                'svgPath' =>
                    '<svg class="flex-shrink-0 size-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" /></svg>',
            ])
            @include('admin.components.chartcard', [
                'bgcolor' => 'white',
                'title' => 'Client',
                'tooltip' => 'Nombre totale client',
                'amount' => '527',
                'chart' => '1.5',
                'svgPath' => '<svg class="flex-shrink-0 size-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                                                            <circle cx="9" cy="7" r="4" />
                                                                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                                                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                                                        </svg>',
            ])
            <!-- End Card -->

            @include('admin.components.chartcard', [
                'bgcolor' => 'white',
                'title' => 'Produits',
                'tooltip' => 'Nombre totale produit',
                'amount' => '2,980',
                'chart' => '11.5',
                'svgPath' => '<svg class="flex-shrink-0 size-5 text-gray-600 dark:text-gray-400"
                                                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                                            stroke-linejoin="round">
                                                                                            <path d="M5 22h14" />
                                                                                            <path d="M5 2h14" />
                                                                                            <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                                                                                            <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                                                                                        </svg>',
            ])

        </div>
        <div class="mt-10 relative overflow-x-auto  sm:rounded-lg">

            <div class="flex justify-between w-full mb-4 ">
                <p class="text-xl font-bold">Client recent</p>
                
                <a href="#" class="rounded-md border flex shadow  hover:bg-gray-50 px-3 py-1 ">Voir plus
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                      </svg>
                </a>
            </div>

            <table class="w-full text-sm border text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Agent
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold">Neil Sims</div>
                                <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            React Developer
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold">Bonnie Green</div>
                                <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            Designer
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold">Jese Leos</div>
                                <div class="font-normal text-gray-500">jese@flowbite.com</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            Vue JS Developer
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold">Thomas Lean</div>
                                <div class="font-normal text-gray-500">thomes@flowbite.com</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            UI/UX Engineer
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold">Leslie Livingston</div>
                                <div class="font-normal text-gray-500">leslie@flowbite.com</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            SEO Specialist
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Offline
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
    <div class="flex-2  lg:w-[350px] ">

        <div class="lg:space-y-4 lg:pb-8 sm:grid-cols-2 max-lg:gap-6 sm:mt-10 lg:mt-0"
            uk-sticky="media: 1024; end: #js-oversized; offset: 80">

            <a href="{{ route('clients.create') }}" class="w-full p-5 bg-black border flex items-center rounded-2xl hover:bg-gray-900 mb-4">
                <div class="rounded-full w-8 h-8 bg-gray-200 flex items-center justify-center mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <p class="font-bold text-white">Ajouter</p>
                    <p class="text-sm text-white">Ajouter un client</p>
                </div>
            </a>
            <a href="{{ route('admin.agent') }}" class="w-full p-5 bg-white border flex items-center rounded-2xl hover:bg-gray-50 mb-4">
                <div class="rounded-full w-8 h-8 bg-gray-200 flex items-center justify-center mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <p class="font-bold">Ajouter</p>
                    <p class="text-sm">Ajouter un agent</p>
                </div>
            </a>

            <div class="w-full border flex flex-col rounded-2xl p-5 ">

                <div class="flex items-center justify-between w-full mb-2">
                    <h3 class="text-md font-bold">Transactions</h3>

                    <a href="#" class=" rounded font-bold text-blue-500 ">voir plus</a>

                </div>


                <div class="flex items-center justify-between w-full p-3 rounded-md hover:bg-gray-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-gray-200 p-2 mr-2 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                            </svg>


                        </div>
                        <p class="text-sm font-medium text-gray-900">Charle</p>

                    </div>

                    <p class="text-sm font-blod text-green-400 ">+ $1000</p>
                </div>
                <div class="flex items-center justify-between w-full p-3 rounded-md hover:bg-gray-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-gray-200 p-2 mr-2 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>



                        </div>
                        <p class="text-sm font-medium text-gray-900">Charle</p>

                    </div>
                    <p class="text-sm font-medium text-red-400">- $1000</p>
                </div>
                <div class="flex items-center justify-between w-full p-3 rounded-md hover:bg-gray-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-gray-200 p-2 mr-2 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                            </svg>


                        </div>
                        <p class="text-sm font-medium text-gray-900">Charle</p>

                    </div>
                    <p class="text-sm font-medium text-green-400">+ $1000</p>
                </div>
                <div class="flex items-center justify-between w-full p-3 rounded-md hover:bg-gray-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-gray-200 p-2 mr-2 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                            </svg>


                        </div>
                        <p class="text-sm font-medium text-gray-900">Charle</p>

                    </div>
                    <p class="text-sm font-medium text-green-400">+ $1000</p>
                </div>
                <div class="flex items-center justify-between w-full p-3 rounded-md hover:bg-gray-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-md bg-gray-200 p-2 mr-2 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-gray-900">Charle</p>

                    </div>
                    <p class="text-sm font-medium text-red-400">- $1000</p>
                </div>



            </div>
        </div>
    </div>

</div>



@endsection