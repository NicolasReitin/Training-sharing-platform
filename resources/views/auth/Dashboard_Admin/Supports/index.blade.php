@extends('layouts.app')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')
        <div class="main">
            <h1 class="mb-5">Liste des supports</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col" style="text-align: center">ID</th>
                    <th scope="col" style="text-align: center">Titre</th>
                    <th scope="col" style="text-align: center">Description</th>
                    <th scope="col" style="text-align: center">Pièces jointes</th>
                    <th scope="col" style="text-align: center">User</th>
                    <th scope="col" style="text-align: center">categorie</th>
                    <th scope="col" style="text-align: center">Created_at</th>
                    <th scope="col" style="text-align: center">Updated_at</th>
                    <th scope="col" style="text-align: center">Edit</th>
                    <th scope="col" style="text-align: center">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($supports as $support)
                    <tr>
                        <th scope="row">{{ $support->id }}</th>
                        <td>{{ $support->titre }}</td>
                        <td>{{ $support->description }}</td>
                        <td>
                            <ul>
                                @if (isset($support->piece_jointe))
                                    @foreach (json_decode($support->piece_jointe) as $item)
                                    <div class="d-flex gap-2 justify-content-center">
                                        <li class="mt-2"><a href="{{ asset('storage/'.$item) }}" target="_blank" style="color: whitesmoke">{{ explode('__', $item)[1] }}</a></li>
                                    </div>
                                    @endforeach
                                @endif 
                            </ul>
                        </td>
                        <td>{{ $support->user_id }}</td>
                        <td>{{ $support->categorie_id }}</td>
                        <td>{{ $support->created_at }}</td>
                        <td>{{ $support->updated_at }}</td>
                        <td>
                            <a href="" class="btn btn-warning"><img src="{{ asset('assets/icones/edit.svg') }}" alt="edit"></a>
                        </td>
                        <td>
                            <form action="" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sûr de vouloir supprimer cet utilisateur?')"><img src="{{ asset('assets/icones/trash.svg') }}" alt="delete"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                
            </table>

            <div class="paginate">
                {!! $supports->links() !!} 
            </div>
        </div>
    </div>
@endsection