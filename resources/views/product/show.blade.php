@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mt-5">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <img src="/storage/uploads/{{$product->image}}" alt="{{$product->title}}" width="500">
                </div>
                <div class="col-lg-5">
                    <div class="my-5">
                        <h2>{{$product->title}}</h2>
                    </div>

                    <div class="my-5">
                        <hr class="hr"/>
                        <b>Description: </b><p>{{$product->description_product}}</p>
                    </div>
                    <div class="my-5">
                        <hr class="hr" />
                        <b>prix: </b><p>{{$product->price}}</p>
                    </div>

                    @if ($product->discount_id != NULL)
                        <div class="my-5">
                            <hr class="hr" />
                            <b>Réduction de : </b><p></p>
                        </div>
                    @endif

                    <button class="btn btn-dark rounded-pill">Ajouter au panier</button>

                    @if (Auth::user()->role == "admin")

                        <button type="button" class="btn btn-success rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#ModalEditProduct">Editer</button>
                        <div class="modal fade" id="ModalEditProduct" tabindex="-1" aria-labelledby="ModalEditProductLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" action="{{route('products.update', $product->id)}}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <div class="mb-3">
                                                <label for="title" class="col-form-label">Titre:</label>
                                                <input type="text" class="form-control" name="title" id="title" value="{{$product->title}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description_product" class="col-form-label">Description:</label>
                                                <textarea class="form-control" name="description_product" id="description_product" value="{{$product->description_product}}"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="col-form-label">Prix:</label>
                                                <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image: </label>
                                                <input type="file" class="form-control" name="image" id="image" value="{{$product->image}}">
                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success rounded-pill shadow-sm">Editer</button>
                                        </form>

                                        <button type="button" class="btn btn-secondary rounded-pill shadow-sm" data-bs-dismiss="modal">Retour</button>
                                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="btn btn-danger rounded-pill shadow-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-warning rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#ModalEditDiscount">Editer une réduction</button>
                        <div class="modal fade" id="ModalEditDiscount" tabindex="-1" aria-labelledby="ModalEditDiscountLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="{{route('products.applyDiscount', $product->id)}}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <div class="form-group">
                                                <label class="my-2" for="discount_id" class="col-form-label">Réduction: </label>
                                                <select class="form-select" name="discount_id">
                                                  <option selected>Selectionne la réduction </option>
                                                        @foreach ($discounts as $discount)
                                                            <option value="{{$discount->id}}">
                                                                {{ $discount->discount_name}} avec {{$discount->discount_percent}}
                                                            </option>

                                                        @endforeach
                                                </select>
                                            </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success rounded-pill shadow-sm">Appliquer la réduction</button>
                                        </form>

                                        <button type="button" class="btn btn-secondary rounded-pill shadow-sm" data-bs-dismiss="modal">Retour</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
