@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Créer un nouveau produit</h3>
                        <form enctype="multipart/form-data" action="{{route('products.store', $user = Auth::user())}}" method="POST">
                             @csrf

                            <div class="form-group">
                                <label class="my-2" for="title">Nom: </label>
                                <input type="text" name="title" class="form-control" value="{{$product->title}}">
                            </div>

                            <div class="form-group">
                                <label class="my-2" for="description_product" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="description_product" id="description_product" value="{{$product->description_product}}"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="my-2" for="category_id" class="col-form-label">Categorie: </label>
                                <select class="form-select" name="category_id">
                                  <option selected>Selectionne la categorie </option>
                                        @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">
                                            {{ $categorie->category_name}}
                                        </option>
                                        
                                        @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="my-2" for="quantity" class="col-form-label">quantité du produit:</label>
                                <input class="form-control" name="quantity" id="quantity" value="{{$product->quantity}}">
                            </div>

                            <div class="form-group">
                                <label class="my-2" for="price" class="col-form-label">Prix:</label>
                                <input class="form-control" name="price" id="price" value="{{$product->price}}">
                            </div>
                           
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$product->discount}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Promotion
                                </label>
                            </div> --}}

                            <div class="form-group">
                                <label class="my-2" for="image">Image</label>
                                <input type="file" name="image" class="form-control" value="{{$product->image}}">
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm mt-3">créer</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection