@extends('layouts.app')


@section('content')
<div class="container-fluid ms-2 d-flex">
    
    @include('layouts.sidebar')

    <div class="main">
        <div>
            <h1>Mes supports de cours</h1>
            {{-- success message for validate extension file and push file in DB --}}
            @if(session('success'))
                    <div class="alert alert-success" style="width: 400px">
                    {{ session('success') }}
                    </div> 
            @endif

            <div class="cards mt-5">
                @foreach ($supports as $support)
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $support->titre }}</h3>
                        <p class="card-text description mt-5">{{ $support->description }}</p>
                        <h5><u><b>Dates de mission :</b></u></h5>
                        <ul>
                            <li class="card-text"><b>Début : </b>{{ $support->date_debut }}</li>
                            <li class="card-text"><b>Fin : </b>{{ $support->date_fin }}</li>
                        </ul>
                        <h5><u><b>Pièces jointes :</b></u></h5>
                        <ul>
                            @if (isset($support->piece_jointe))
                                @foreach (json_decode($support->piece_jointe) as $item)
                                    <li class="mt-2"><a href="{{ asset('storage/'.$item) }}" target="_blank"><img class="me-2" src="{{ asset('assets/icones/download.svg') }}" alt="download">{{ explode('__', $item)[1] }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="button">
                            <a href="{{ route('show.supports', ['support' => $support]) }}" class="btn btn-secondary">Details</a>
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
