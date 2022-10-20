<?php

    $bdd = new PDO('mysql:host=localhost;dbname=epetitpas; charset=utf8', 'root', '');

    $Supports = $bdd->query("SELECT * FROM supports");
    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $recherche = htmlspecialchars($_GET['search']);
        $Supports = $bdd->query("SELECT * FROM supports WHERE (titre LIKE '%$recherche%' OR description LIKE '%$recherche%') ");
    }
?>

@extends('layouts.app')

@section('content')
    <div class="container-fluid ms-2 d-flex">
    @include('layouts.sidebar')

        <div class="main">
            <div>
                {{-- barre de recherche --}}
                <div class="searchbar mb-5">
                    <form action="{{ route('home.search') }}" method="GET" class="d-flex gap-2">
                        <input type="search" class="form-control" name="search" placeholder="Search ..." id="" style="width: 300px">
                        <input type="submit" class="form-control btn btn-warning" name="envoyer" value="Search" style="width: 100px">
                    </form>
                </div>

                @foreach ($categories as $categorie) <!-- On parcours toutes les catégories pour les afficher chacune -->
                    <h2 class="mb-5" style="text-align: start; font-weight: bold">{{ $categorie->titre }}</h2>
                    <div class="d-flex gap-5">
                        @foreach ($categorie->users()->get() as $user) <!-- On parcours tous les users qui sont rattachés à la catégorie -->
                            @foreach ($user->supports()->get() as $item) <!-- On parcours tous les supports de l'utilisateur  -->
                                @if ($item->categorie_id == $categorie->id) <!-- si l'id de la categorie est égal à l'id de la categorie dans le support ET que celui-ci possède bien un support avec l'id de la categorie, alors on affiche l'utilisateur, sinon on ne l'affiche pas dans cette catégorie -->
                                    <div class="card" style="width: 18rem;">
                                        <h4 class="text-center">{{ ucfirst($user->name) }}</h4>
                                        <div class="ms-3">
                                            @foreach ($user->supports()->get() as $support) <!-- On parcours de nouveau tous les supports de l'utilisateur  -->
                                                @if ($support->categorie_id == $categorie->id)
                                                    <div class="card mb-2" style="width: 16rem;">
                                                        <a href="{{ route('show.supports', ['support' => $support->id]) }}" style="text-decoration: none; color: black"><p class="ms-1">{{ strtoupper($support->titre) }}</p></a>                                                        
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <hr>
                @endforeach
                
                <div class="cards mt-5">
                <?php
                    if ($Supports->rowCount() > 0) {
                        while ($support = $Supports->fetch()) {
                            $id = $support['id'];
                            $titre = $support['titre'];
                            $description = $support['description'];
                            ?>
                            <div class="card">
                                <div class="card-body d-flex">
                                    <a href="{{ route('show.supports', ['support' => $id]) }}"><h5 class="card-title"><?= $titre ?></h5></a>
                                </div>
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                            <p>Aucun support </p>
                        <?php
                    }
                    ?>

                    <div class="paginate">
                        {!! $supports->links() !!} 
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection