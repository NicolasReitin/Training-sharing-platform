

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
                
                <div class="">
                    @if (isset($results)) <!--  -->
                        @if ($results)    <!-- Si dans la barre de recherche apparaît un support de cours -->  
                            <h2 class="mb-4"><u><b>Supports</b></u> </h2>
                            @foreach ($results as $result) <!-- On parcours l'ensemble des resultats et pour chacun... -->
                                @foreach ($supports as $support) <!-- On parcours les supports -->
                                    @if ($support->id == $result->id)  <!-- on compare l'id du support avec celui de la recherche -->
                                        <div class="card mb-3" style="width: 16rem;"> 
                                            <a href="{{ route('show.supports', ['support' => $support->id]) }}" style="text-decoration: none; color: black"><p class="ms-3">{{ $support->titre }}</p></a>   
                                            @foreach ($users as $user) <!-- On veut afficher le nom du formateur du support -->
                                                @if ($user->id == $support->user_id) <!-- On compare l'id des formateurs avec celui du support afin d'afficher son nom -->
                                                    <p><u>Formateur</u> : <b>{{ $user->name }}</b></p>
                                                @endif
                                            @endforeach
                                        </div>                                     
                                    @endif
                                @endforeach
                            @endforeach 
                        @endif
                    
                    @else
                    
                        @foreach ($categories as $categorie) <!-- On parcours toutes les catégories pour les afficher chacune -->
                            <h2 class="mb-5" style="text-align: start; font-weight: bold">{{ $categorie->titre }}</h2>
                            <div class="d-flex gap-5">
                                @foreach ($categorie->users()->get() as $user) <!-- On parcours tous les users qui sont rattachés à la catégorie -->
                                    @foreach ($user->supports()->get() as $item) <!-- On parcours tous les supports de l'utilisateur  -->
                                        @if ($item->categorie_id == $categorie->id) <!-- si l'id de la categorie est égal à l'id de la categorie dans le support ET que celui-ci possède bien un support avec l'id de la categorie, alors on affiche l'utilisateur, sinon on ne l'affiche pas dans cette catégorie -->
                                            <div class="card" style="width: 18rem;">
                                                <h4 class="text-center mt-2 mb-2">{{ ucfirst($user->name) }}</h4>
                                                <div class="ms-3">
                                                    @foreach ($user->supports()->get() as $support) <!-- On parcours de nouveau tous les supports de l'utilisateur  -->
                                                        @if ($support->categorie_id == $categorie->id)
                                                            <div class="card mb-2" style="width: 16rem;">
                                                                <a href="{{ route('show.supports', ['support' => $support->id]) }}" style="text-decoration: none; color: black"><p class="ms-1">{{ $support->titre }}</p></a>                                                        
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

                    @endif

                    <div class="paginate">
                        {!! $supports->links() !!} 
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection