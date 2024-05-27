@extends('biicf.layout.navside')

@section('title', 'Details notification')

@section('content')


    <div class="max-w-3xl mx-auto">

        <div class="flex flex-col bg-white p-4 rounded-xl border justify-center ">



            <h2 class="text-lg font-meduim mb-4"><span class="font-semibold ">Titre: </span>
                {{ $notification->data['nameProd'] }}</h2>
            <p class="mb-3"><strong>Quantité:</strong> {{ $notification->data['quantité'] }}</p>
            <p class="mb-3"><strong>Localité:</strong> {{ $notification->data['localite'] }}</p>
            <p class="mb-3"><strong>Spécificité:</strong> {{ $notification->data['specificite'] }}</p>

            <p class="mb-3"><strong>Prix total:</strong> {{ $notification->data['montantTotal'] ?? 'N/A' }} Fcfa</p>

            <a href="{{ route('biicf.postdet', $notification->data['idProd'] ) }}" class="mb-3 text-blue-700 hover:underline flex">Voir le produit 
                <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </a>

            <div class="flex gap-2">

                <form id="form-accepter" action="{{ route('achatD.accepter') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="userSender" value="{{ $notification->data['userSender'] }}">
                    <input type="hidden" name="montantTotal" value="{{ $notification->data['montantTotal'] }}">
                    <button id="btn-accepter" type="submit"
                        class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-700">Accepter</button>
                </form>
                <form id="form-refuser" action="{{ route('achatD.refuser') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="montantTotal" value="{{ $notification->data['montantTotal'] }}">
                    <input type="hidden" name="userSender" value="{{ $notification->data['userSender'] }}">
                    <input type="hidden" name="message" value="refus de produit">
                    <button id="btn-refuser" type="submit"
                        class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">Refuser</button>
                </form>
            </div>

        </div>

    </div>




@endsection
