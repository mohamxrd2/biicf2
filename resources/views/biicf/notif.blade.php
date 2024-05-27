@extends('biicf.layout.navside')

@section('title', 'Notification')

@section('content')
    <!-- Afficher les messages de succès -->
    @if (session('success'))
        <div class="bg-green-500 text-white font-bold rounded-lg border shadow-lg p-3 mb-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Afficher les messages d'erreur -->
    @if (session('error'))
        <div class="bg-red-500 text-white font-bold rounded-lg border shadow-lg p-3 mb-3">
            {{ session('error') }}
        </div>
    @endif


    <div class="max-w-5xl mx-auto ">
        <div class="w-full mb-5 relative flex justify-center items-center">

            <h1 class="text-xl font-medium text-slate-800 relative">
                Notifications
                <span
                    class="absolute top-2 right-[-6px] w-4 h-4 text-[11px] font-semibold text-center flex items-center justify-center bg-red-700 text-white rounded-full transform translate-x-1/2 -translate-y-1/2">4</span>
            </h1>
        </div>
        @foreach (auth()->user()->notifications as $notification)
            <a href="{{ route('notification.show', $notification->id) }}" class="">
                <div class="w-full px-3 py-2 bg-white border-y border-gray-200 hover:bg-gray-50">
                    @if (isset($notification->data['message']) && isset($notification->data['reason']))
                        <p>{{ $notification->data['message'] }}</p>
                        <p>Raison: {{ $notification->data['reason'] }}</p>
                    @else
                        <div class="flex w-full">
                            <div class=" w-16 h-16  overflow-hidden mr-3">
                                <img src="{{ asset($notification->data['photoProd']) }}" alt="Product Image"
                                    class="w-full h-full object-cover">

                            </div>

                            <div class="flex flex-col justify-between w-full">
                                <div class="flex justify-between items-center w-full">
                                    <h3 class="text-md font-semibold">{{ $notification->data['nameProd'] }}</h3>

                                    <p class="text-[12px] text-gray-400 text-right">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>

                                </div>
                                <div class="flex justify-between items-center w-full h-full">

                                    <p class="text-sm text-slate-500 l max-w-1/2  font-normal">Vous avez reçu une commande
                                        de cet article en achat direct
                                    </p>
                                   
                                    <div class="w-10 flex justify-center items-center">
                                        <span class="w-2 h-2 rounded-full bg-purple-700"></span>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </a>
        @endforeach

    </div>





@endsection
