@extends('layouts.app')


@section('content')
    <div class="container-fluid ms-2 d-flex">
        @include('layouts.AdminSidebar')
        <div class="main">
            <h1 class="mb-5">Liste des utilisateurs</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ ucfirst($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
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
                {!! $users->links() !!} 
            </div>
        </div>
    </div>
@endsection