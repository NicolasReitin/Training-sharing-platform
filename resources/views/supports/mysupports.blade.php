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
                <a class="nav-link" href="{{ route('create.supports') }}">Nouveau support</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="">Autres</a>
            </li>
        </ul>
    </div>

    <div class="main">
        <div>
            <h1>Mes supports de cours</h1>
            <div class="cards mt-5">
                @foreach ($supports as $support)
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $support->titre }}</h3>
                        <p class="card-text description mt-5">{{ $support->description }}</p>
                        <h5><u><b>Dates de mission :</b></u></h5>
                        <ul>
                            <p class="card-text"><b>Début : </b>{{ $support->date_debut }}</p>
                            <p class="card-text"><b>Fin : </b>{{ $support->date_fin }}</p>
                        </ul>
                            
                        <div class="button">
                            <a href="{{ route('show.supports', ['support' => $support]) }}" class="btn btn-secondary">+ d'infos</a>
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
