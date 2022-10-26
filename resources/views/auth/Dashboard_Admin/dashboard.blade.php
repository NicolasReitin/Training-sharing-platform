@extends('layouts.app')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')

            <div class="main">
                Bienvenue <b>{{ ucfirst(Auth::user()->name) }}</b>
                <hr>
                <div class="blocLastPosts d-flex gap-5" style="width: 100%">
                    <div class="left" style="width: 40%">
                        <h2><u><b>5 derniers utilisateurs inscrits</b></u> : <br></h2>
                        @foreach ($users as $user)
                            <div style="margin-bottom: -15px">
                                <a href="{{ route('show.user', ['user' => $user]) }}">{{ ucfirst($user->name) }}</a>
                            </div>
                            <br>
                        @endforeach
                        <br>
                        <p><a href="{{ route('users') }}">(Voir tous)</a></p>
                    </div>

                    <div class="right" style="width: 40%">
                        <h2><u><b>5 derniers supports déposés</b></u> : <br></h2>
                        @foreach ($supports as $support)
                            <div style="margin-bottom: -15px">
                                <a href="{{ route('show.support', ['support' => $support]) }}">{{ ucfirst($support->titre) }}</a>
                            </div>
                            <br>
                        @endforeach
                        <br>
                        <p><a href="{{ route('supports') }}">(Voir tous)</a></p>
                    </div>    
                </div>
                




                
            </div>
        
    </div>




@endsection
