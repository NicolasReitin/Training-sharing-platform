@extends('layouts.app')


@section('content')
<div class="container-fluid ms-2 d-flex">
    
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Accueil</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="">Nouveau support</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="">Ajout catégories</a>
            </li>
        </ul>
    </div>

    <div class="main ms-5">
        <div>
            <h1>Mes supports de cours</h1>
            <div class="cards mt-5">
                @foreach ($supports as $support)
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $support->titre }}</h3>
                        <p class="card-text">Description : <br>{{ $support->description }}</p>
                        <div class="button">
                            <a href="#" class="btn btn-secondary">+ d'infos</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            
        </div>
        
    </div>
    
</div>
    

    



    @include('layouts.footer')
@endsection
