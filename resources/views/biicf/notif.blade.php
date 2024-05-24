@extends('biicf.layout.navside')

@section('title', 'Notification')

@section('content')


    <div class="max-w-5xl mx-auto">
        @foreach (auth()->user()->unreadNotifications as $notification)
            <div class="w-full rounded-xl px-3 py-2 bg-white border border-gray-200 mb-3">

                <div class="flex w-full">
                    <div class=" w-14 h-auto rounded-md overflow-hidden mr-3">
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
                        <div class="flex justify-between items-center w-full">

                            <p class="text-sm text-slate-500  font-normal">Vous avez reçu une commande en achat direct </p>
                            {{-- <h2 class="text-lg font-semibold mb-2">{{ $notification->data['nameProd'] }}</h2>
                        <p><strong>Quantité:</strong> {{ $notification->data['quantité'] }}</p>
                        <p><strong>Prix total:</strong> {{ $notification->data['montantTotal'] ?? 'N/A' }} Fcfa</p>
                        <p><strong>Localité:</strong> {{ $notification->data['localite'] }}</p>
                        <p><strong>Spécificité:</strong> {{ $notification->data['specificite'] }}</p>
                        <p><strong>Trader ID:</strong> {{ $notification->data['userTrader'] }}</p>
                        <p><strong>Sender ID:</strong> {{ $notification->data['userSender'] }}</p> --}}

                            <div class="hidden lg:block">
                                <div class="flex gap-2">

                                    <form id="form-accepter" action="{{ route('achatD.accepter') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        {{-- <input type="hidden" name="montant_total"
                                        value="{{ $notification->data['montant_total'] }}"> --}}
                                        <input type="hidden" name="user_sender"
                                            value="{{ $notification->data['userSender'] }}">
                                        <button id="btn-accepter" type="submit"
                                            class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-700">Accepter</button>
                                    </form>
                                    <form id="form-refuser" action="{{ route('achatD.refuser') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        {{-- <input type="hidden" name="montant_total"
                                        value="{{ $notification->data['montant_total'] }}"> --}}
                                        {{-- <input type="hidden" name="user_sender" value="{{ $notification->data['user_sender'] }}"> --}}
                                        <input type="hidden" name="message" value="refus de produit">

                                        <button id="btn-refuser" type="submit"
                                            class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">Refuser</button>
                                    </form>
                                </div>
                            </div>


                        </div>



                    </div>


                </div>





            </div>
        @endforeach

    </div>



@endsection
