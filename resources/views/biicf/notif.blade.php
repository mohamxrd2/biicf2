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
        @foreach (auth()->user()->unreadNotifications as $notification)
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
                                    {{-- <h2 class="text-lg font-semibold mb-2">{{ $notification->data['nameProd'] }}</h2>
                        <p><strong>Quantité:</strong> {{ $notification->data['quantité'] }}</p>
                        <p><strong>Localité:</strong> {{ $notification->data['localite'] }}</p>
                        <p><strong>Spécificité:</strong> {{ $notification->data['specificite'] }}</p>
                        <p><strong>Trader ID:</strong> {{ $notification->data['userTrader'] }}</p>
                        <p><strong>Sender ID:</strong> {{ $notification->data['userSender'] }}</p> --}}
                                    {{-- <p><strong>Prix total:</strong> {{ $notification->data['montantTotal'] ?? 'N/A' }} Fcfa</p> --}}

                                    {{-- <div class="flex gap-2">

                                        <form id="form-accepter" action="{{ route('achatD.accepter') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="userSender"
                                                value="{{ $notification->data['userSender'] }}">
                                            <input type="hidden" name="montantTotal"
                                                value="{{ $notification->data['montantTotal'] }}">
                                            <button id="btn-accepter" type="submit"
                                                class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-700">Accepter</button>
                                        </form>
                                        <form id="form-refuser" action="{{ route('achatD.refuser') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="montantTotal"
                                                value="{{ $notification->data['montantTotal'] }}">
                                            <input type="hidden" name="userSender"
                                                value="{{ $notification->data['userSender'] }}">
                                            <input type="hidden" name="message" value="refus de produit">
                                            <button id="btn-refuser" type="submit"
                                                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">Refuser</button>
                                        </form>
                                    </div> --}}

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
