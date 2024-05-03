@extends('admin.layout.navside')

@section('title', 'Dashboard')

@section('content')
    <!-- Dans votre fichier de vue de tableau de bord -->

    @auth('admin')
        @if (Auth::guard('admin')->user()->admin_type == 'agent')
            <!-- Contenu spécifique à l'agent -->
            <h1>Tableau de bord de l'agent</h1>
            <!-- Autres éléments spécifiques à l'agent -->

            @include('admin.dashboard.dashbord_agent')
            @else
            <!-- Contenu spécifique à l'administrateur général -->
            <h1>Tableau de bord de l'administrateur général</h1>
            <!-- Autres éléments spécifiques à l'administrateur général -->

            @include('admin.dashboard.dashbord_admin')

        @endif
    @endauth







@endsection
