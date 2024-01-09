@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            @foreach ( $articles as $article )
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$article->title }}</div>
                    <div class="card-body">
                    <p>{{$article->description_product}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
