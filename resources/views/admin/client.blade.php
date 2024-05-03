@extends('admin.layout.navside')

@section('title', 'Clients')

@section('content')

    @auth('admin')
        @if (Auth::guard('admin')->user()->admin_type == 'agent')
            @include('admin.clients.client_agent')
        @else
            @include('admin.clients.client_admin')
        @endif
    @endauth


    <div class="my-5 flex justify-end">
        {{ $users->links() }}
    </div>

    <script src="{{ asset('js/search.js') }}"></script>

@endsection
