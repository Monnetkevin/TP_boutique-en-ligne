<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link align-middle px-0 text-white">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin')}}" class="nav-link px-0 align-middle px-0 text-white">
                                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Utilisateur</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('productsAdmin')}}" class="nav-link px-0 align-middle px-0 text-white">
                                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Produit</span> </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('categoriesAdmin')}}" class="nav-link px-0 align-middle px-0 text-white">
                                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Catégorie</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link px-0 align-middle px-0 text-white">
                                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Promotion</span> </a>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>



                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        <div class="container text-center">
                            @if (session()->has('message'))
                                <p class="alert alert-success">{{session()->get('message')}}</p>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error )
                                            <li> {{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
