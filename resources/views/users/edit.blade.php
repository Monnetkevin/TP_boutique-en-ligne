@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <h1 class="text-center my-4">Gestion de mon compte</h1>

            @if (Auth::user()->id == $user->id)
                <div class=" col-lg-4 my-4">
                    <div class="card shadow border-0 rounded">
                        <div class="card-body">
                            <h3 class="text-center mb-4">Mes informations</h3>

                            <div class="col-lg-8">
                                <p><b>Nom :</b> {{$user->last_name}}</p>
                                <p><b>Prenom :</b> {{$user->first_name}}</p>
                                <p><b>Email :</b> {{$user->email}}</p>
                                <p><b>Téléphone :</b> {{$user->phone}}</p>
                                <p><b>Adresse :</b> {{$user->address}}</p>
                                <p><b>Code postal :</b> {{$user->postal_code}}</p>
                                <p><b>Ville :</b> {{$user->city}}</p>
                                <p><b>Date de création :</b> {{$user->created_at->format('d/m/Y à H:i')}}</p>
                            </div>


                            <button type="button" class="btn btn-primary rounded-pill shadow-sm mt-4" data-bs-toggle="modal" data-bs-target="#ModalEditUsers">Modifier les informations</button>
                                <div class="modal fade" id="ModalEditUsers" tabindex="-1" aria-labelledby="ModalEditUsersLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="ModalEditUsersLabel">Editer mon compte</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="mb-3">
                                                    <label for="last_name" class="col-form-label">Nom :</label>
                                                    <input class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="first_name" class="col-form-label">Prénom :</label>
                                                    <input class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email : </label>
                                                    <input class="form-control" name="email" id="email" value="{{$user->email}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone" class="col-form-label">Téléphone :</label>
                                                    <input class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address" class="col-form-label">Adresse :</label>
                                                    <input class="form-control" name="address" id="address" value="{{$user->address}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="postal_code" class="col-form-label">Code postal :</label>
                                                    <input class="form-control" name="postal_code" id="postal_code" value="{{$user->postal_code}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="city" class="col-form-label">Ville :</label>
                                                    <input class="form-control" name="city" id="city" value="{{$user->city}}">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success rounded-pill shadow-sm">Editer</button>
                                            </form>

                                            <button type="button" class="btn btn-secondary rounded-pill shadow-sm" data-bs-dismiss="modal">Retour</button>

                                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-pill shadow-sm">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

    </div>
</div>
@endsection
