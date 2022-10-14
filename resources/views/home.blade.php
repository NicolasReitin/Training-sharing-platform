@extends('layouts.app')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.sidebar')

        <div class="main">
            <div>
                <h1>Supports de cours</h1>
                <div class="cards mt-5">
                    @foreach ($supports as $support)
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $support->titre }}</h3>
                            <p class="card-text description mt-5">{{ $support->description }}</p>
                            <div class="button">
                                <a href="{{ route('show.supports', ['support' => $support]) }}" class="btn btn-secondary">+ d'infos</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="paginate">
                    {!! $supports->links() !!} 
                </div>
            </div>
            
        </div>
    </div>


    @include('layouts.footer')
@endsection

