@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 mt-5 sticky">
            <h3>Recherche</h3>
            <form action="{{route('home')}}" method="GET" role="search">
                {{ csrf_field() }}
                <div class="form-group mt-5">
                    <label class="mb-3" for="category_id" class="col-form-label">Categorie: </label>
                    <select class="form-select" name="q">
                      <option selected>Selectionne la categorie </option>
                            @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">
                                {{ $categorie->category_name}}
                            </option>
                            @endforeach
                    </select>
                </div>
                <div class="input-group mt-5">
                        <button class="btn btn-success ms-4" type="submit">Recherche</button>
                        <a href="{{route('home')}}" class="btn btn-dark ms-4">Annuler</a>
                </div>

            </form>
        </div>

        <div class="col-md-8 justify-content-center">
            <div class="row">
                @foreach ( $products as $product )
                <div class="col-lg-4 my-4 mb-lg-0">
                    <div class="card border-0 rounded">
                        <div class="card-body">
                            <a href="{{route('products.show', $product->id)}}">
                            <img src="/storage/uploads/{{$product->image}}" alt="{{$product->title}}" class="card-img-top">
                            </a>
                            <div class="card-footer border-0 ">
                                <h5>{{$product->title}}</h5>
                                <p>{{$product->price}} €</p>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
