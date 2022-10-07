@extends('layouts.app')


@section('content')
<div class="container-fluid ms-2 d-flex">

@include('layouts.sidebar')

    <div class="cards mt-5">
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
                <div class="button d-flex gap-2">
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




