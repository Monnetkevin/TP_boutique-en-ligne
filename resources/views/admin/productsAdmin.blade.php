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

                     {{-- @foreach ($produits as $produits )
                        <tbody>
                            <tr>
                            <th>{{$user->id}}</th>
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
                    @endforeach --}}
                </table>

        </div>
    </div>
</div>

@endsection
