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
                <div class="searchbar">
                    <form action="" method="GET" class="d-flex gap-2">
                        <input type="search" class="form-control" name="search" placeholder="Search ..." id="" style="width: 300px">
                        <input type="submit" class="form-control btn btn-warning" name="envoyer" value="Search" style="width: 100px">
                    </form>
                </div>

                @foreach ($categories as $categorie)
                <h1>{{  $categorie->titre }}</h1>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    {{-- div formateur par catégorie et y inclure les suppports par formateurs --}}
                <hr>
                @endforeach
                
                <h1>Supports de cours</h1>
                <div class="cards mt-5">
                <?php
                    if ($Supports->rowCount() > 0) {
                        while ($support = $Supports->fetch()) {
                            $id = $support['id'];
                            $titre = $support['titre'];
                            $description = $support['description'];
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $titre ?></h3>
                                    <p class="card-text description mt-5"><?= $description ?></p>
                                    <div class="button">
                                        <a href="{{ route('show.supports', ['support' => $id]) }}" class="btn btn-secondary">+ d'infos</a>
                                    </div>
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