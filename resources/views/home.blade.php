@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2" style="border: 1px solid red">

        </div>
        <div class="col-lg-8 justify-content-center">
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
        </div>
    </div>
</div>
@endsection
