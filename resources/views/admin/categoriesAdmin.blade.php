@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 mt-5 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>

                     @foreach ($categories as $categorie )
                        <tbody>
                            <tr>
                            <th>{{$categorie->id}}</th>
                            <td>{{$categorie->category_name}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-small rounded-pill" data-bs-toggle="modal" data-bs-target="#ModalEditCategorie">Editer</button>
                                <div class="modal fade" id="ModalEditCategorie" tabindex="-1" aria-labelledby="ModalEditCategorieLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="{{route('categories.update', $categorie->id)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="mb-3">
                                                        <label for="category_name" class="col-form-label">Nom de la catégorie:</label>
                                                        <input type="text" class="form-control" name="category_name" id="category_name" value="{{$categorie->category_name}}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success rounded-pill shadow-sm">Editer</button>
                                                </form>

                                                <button type="button" class="btn btn-secondary rounded-pill shadow-sm" data-bs-dismiss="modal">Retour</button>
                                                <form action="{{route('categories.destroy', $categorie->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                     <button type="submit" class="btn btn-danger btn-sm rounded-pill">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
        </div>
    </div>
</div>

@endsection
