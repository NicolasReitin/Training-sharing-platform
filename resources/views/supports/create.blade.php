@extends('layouts.app')

@section('content')

<div class="container-fluid ms-2 d-flex">
    @include('layouts.sidebar')

    <div class="main ms-5">
        <div>
        <h1><b>Création d'un nouveau support</b></h1>
        </div>
    <div class="mt-5 ms-5 d-flex justify-content-center">
        <form action="{{ route('store.supports') }}" method="POST" style="width: 100%" class="d-flex justify-content-center" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="mt-2" for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" style="width: 400px">
                @error('titre')
                    <span class="alert alert-warning d-flex" role="alert"> error : {{ $message }}</span>
                @enderror

                <label class="mt-2" for="description">Description</label>
                <textarea id="description" name="description" rows="4" cols="50" class="form-control" style="width: 400px"></textarea>

                <label class="mt-2" for="date_debut">Date de début</label>
                <input type="date" name="date_debut" id="date_debut" class="form-control" style="width: 400px">

                <label class="mt-2" for="date_fin">Date de fin</label>
                <input type="date" name="date_fin" id="date_fin" class="form-control" style="width: 400px">

                {{-- <label class="mt-2" for="sequences">Séquences</label>
                <input type="text" name="sequences" id="sequences" class="form-control" style="width: 400px"> --}}
    
                <label class="mt-2" for="filename">Fichiers à upload (.pdf, .ppt, .doc, .zip)</label>
                <input type="file" class="form-control" name="filename[]" id="filename" style="width: 400px" multiple>
    
                <input type="submit" class="btn btn-warning mt-3" style="width: 400px" name="Envoyer" value="Création du support" >
            </div>
            
            
        </form>
    </div>

@endsection