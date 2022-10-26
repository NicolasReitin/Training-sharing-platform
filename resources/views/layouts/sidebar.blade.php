<div class="d-block">

    <div class="sidebar">
        <h4><u></u></h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mysupports') }}">Mes supports</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('create.supports') }}">Nouveau support</a>
            </li>
            <hr>
        </ul>
    </div>

    @auth
        @foreach ( Auth::user()->roles as $role)
            @if ($role->name === 'admin' OR $role->name === 'Admin')
                <div class="sidebar mt-5">
                    <h4><u>Catégories</u></h4>
                    <ul class="nav flex-column">
                    @foreach (DB::table('categories')->get() as $categorie)
                        <li class="nav-item"><a class="nav-link" href="">{{  $categorie->titre }}</a></li>
                        <hr>
                    @endforeach
                    </ul>
                </div>
            @endif
        @endforeach
    @endauth 
</div>
