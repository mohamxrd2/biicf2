@extends('biicf.layout.navside')

@section('title', 'Notification')

@section('content')


    <div class="max-w-5xl mx-auto">


        <div class="w-full rounded-xl px-3 py-2 bg-white border border-gray-200 ">


            <div class="flex w-full">
                <div class=" w-14 h-auto rounded-md overflow-hidden mr-3">
                    <img src="{{ asset('img/bg.jpg') }}" alt="" class=" w-full h-full object-cover">

                </div>

                <div class="flex flex-col justify-between w-full">
                    <div class="flex justify-between items-center w-full">
                        <h3 class="text-md font-semibold">Titre du produit</h3>

                        <p class="text-[12px] text-gray-400 text-right">il y'a 2min</p>

                    </div>
                    <div class="flex justify-between items-center w-full">

                        <p class="text-sm text-slate-500  font-normal">Vous avez reçu une commande en achat direct </p>

                        <div class="hidden lg:block">
                            <button
                                class="text-sm bg-green-500 hover:bg-green-700 text-white py-2 px-3 rounded-md">Accepter</button>
                            <button
                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-2 px-3 rounded-md">Refuser</button>
                        </div>


                    </div>



                </div>


            </div>





        </div>

    </div>



@endsection
