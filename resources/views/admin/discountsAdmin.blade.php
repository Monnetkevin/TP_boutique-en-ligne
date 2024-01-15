@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 mt-5 m-auto">

            <div class="bg-dark text-white rounded p-5 mb-5 ">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <h3>
                            Nouvelle promotion
                        </h3>
                        <form action="{{route('discounts.store')}}" method="POST">
                            @csrf

                             <div class="form-group">
                                <label class="my-2" for="discount_name">Nom de la promotion: </label>
                                <input type="text" name="discount_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="my-2" for="discount_percent">Pourcentage: </label>
                                <input type="number" name="discount_percent" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="my-2" for="start_date">Début de la promotion: </label>
                                <input type="date" name="start_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="my-2" for="end_date">Fin de la promotion: </label>
                                <input type="date" name="end_date" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-outline-light rounded-pill mt-3 ">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
                <div class="table-responsive-sm">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom de la promotion</th>
                        <th scope="col">Pourcentage </th>
                        <th scope="col">Début</th>
                        <th scope="col">Fin</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>

                     @foreach ($discounts as $discount )
                        <tbody>
                            <tr>
                            <th>{{$discount->id}}</th>
                            <td>{{$discount->discount_name}}</td>
                            <th>{{$discount->discount_percent}}</th>
                            <td>{{$discount->start_date}}</td>
                            <td>{{$discount->end_date}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-small rounded-pill" data-bs-toggle="modal" data-bs-target="#ModalEditDiscount{{$discount->id}}">Editer</button>
                                <div class="modal fade" id="ModalEditDiscount{{$discount->id}}" tabindex="-1" aria-labelledby="ModalEditDiscountLabel{{$discount->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="{{route('discounts.update', $discount->id)}}" method="POST">

                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="form-group">
                                                        <label class="my-2" for="discount_name">Nom de la promotion: </label>
                                                        <input type="text" name="discount_name" class="form-control" value="{{$discount->discount_name}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="my-2" for="discount_percent">Pourcentage: </label>
                                                        <input type="number" name="discount_percent" class="form-control" value="{{$discount->discount_percent}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="my-2" for="end_date">Fin de la promotion: </label>
                                                        <input type="date" name="end_date" class="form-control" value="{{$discount->end_date}}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success rounded-pill shadow-sm">Editer</button>
                                                </form>

                                                <button type="button" class="btn btn-secondary rounded-pill shadow-sm" data-bs-dismiss="modal">Retour</button>
                                                <form action="{{route('discounts.destroy', $discount->id)}}" method="POST">
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
</div>

@endsection
