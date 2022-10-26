@extends('layouts.app')


@section('content')
<div class="container-fluid ms-2 d-flex">

@include('layouts.sidebar')

    <div class="cards mt-5" style="width: 40%; margin-left: 20%">
            <div class="card-body">
                <h2 class="card-title text-center">{{ $support->titre }}</h2>
                <p class="card-text description mt-5">{{ $support->description }}</p>
                <h5 class="text-center"><u><b>Dates de mission :</b></u></h5>
                <ul class="text-center">
                    <li class="card-text"><b>Début : </b>{{ $support->date_debut }}</li>
                    <li class="card-text"><b>Fin : </b>{{ $support->date_fin }}</li>
                </ul>
                <h5 class="text-center"><u><b>Pièces jointes :</b></u></h5>
                <ul class="d-flex gap-2 flex-column">




                @if (isset($support->piece_jointe))
                    @foreach (json_decode($support->piece_jointe) as $item)
                    {{-- {{ explode('/', $item)[1]}} --}}
                    <div class="d-flex gap-2 justify-content-center">
                        <li class="mt-2"><a href="{{ asset('storage/'.$item) }}" target="_blank"><img class="me-2" src="{{ asset('assets/icones/download.svg') }}" alt="download">{{ explode('__', $item)[1] }}</a></li>
                        <form action="{{ route('delete.file', ['support' => $support,'item' => $support->getNameFromUrl($item)]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce fichier?')">X</button>
                        </form>
                    </div>
                    @endforeach
                @endif 
                        
                        



                </ul>

                <div class="button d-flex gap-2 mt-5">
                    <a href="{{ route('edit.supports', ['support' => $support]) }}" class="btn btn-warning"><img src="{{ asset('assets/icones/edit.svg') }}" alt=""></a>
                    <form action="{{ route('delete.supports', ['support' => $support]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce titre?')"><img src="{{ asset('assets/icones/trash.svg') }}" alt=""></button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')

@endsection




