@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mt-5 m-auto">

            <div class="mb-5 text-center">
               <h3 class="title_user_admin">Liste des utilisateurs inscrit</h3>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Code postal</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>

                     @foreach ($users as $user )
                        <tbody>
                            <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->postal_code}}</td>
                            <td>{{$user->city}}</td>
                            <td>
                                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                     <button type="submit" class="btn btn-danger btn-sm rounded-pill">Supprimer</button>
                                </form>
                            </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
