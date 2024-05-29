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
                @if ($unreadCount)
                    <span
                        class="absolute top-2 right-[-6px] w-4 h-4 text-[11px] font-semibold text-center flex items-center justify-center bg-red-700 text-white rounded-full transform translate-x-1/2 -translate-y-1/2 ">{{ $unreadCount }}</span>
                @endif

            </h1>
        </div>
        @foreach (auth()->user()->notifications as $notification)
            <div class="w-full px-3 py-2 bg-white border-y border-gray-200 hover:bg-gray-50">
                @if (isset($notification->data['message']) && isset($notification->data['accept']))
                    <div class="flex w-full">
                        <div class="w-16 h-16 overflow-hidden mr-3">
                            <svg class="w-full text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                              </svg>
                              
                        </div>

                        <div class="flex flex-col justify-between w-full">
                            <div class="flex justify-between items-center w-full">
                                <p class="text-md font-semibold">{{ $notification->data['message'] }}</p>
                                <p class="text-[12px] text-gray-400 text-right">
                                    {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                </p>
                            </div>
                            <p class="text-sm text-slate-500 l max-w-1/2  font-normal">{{ $notification->data['accept'] }}</p>
                        </div>
                    </div>
                @elseif (isset($notification->data['message']) && isset($notification->data['reason']))
                    <div class="flex w-full">
                        <div class="w-16 h-16 overflow-hidden mr-3">
                            <svg class="w-full text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.75 9.75l4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>

                        <div class="flex flex-col justify-between w-full">
                            <div class="flex justify-between items-center w-full">
                                <p class="text-md font-semibold">{{ $notification->data['message'] }}</p>
                                <p class="text-[12px] text-gray-400 text-right">
                                    {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                </p>
                            </div>
                            <p class="text-sm text-slate-500 l max-w-1/2  font-normal">Raison: {{ $notification->data['reason'] }}</p>
                        </div>
                    </div>
                @else
                    <a href="{{ route('notification.show', $notification->id) }}" class="">
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
                                    @if ($notification->read_at == null)
                                        <div class="w-10 flex justify-center items-center">
                                            <span class="w-2 h-2 rounded-full bg-purple-700"></span>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>

            </a>
        @endforeach

    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endsection
