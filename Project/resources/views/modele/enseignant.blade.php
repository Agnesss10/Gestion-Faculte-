<!DOCTYPE html>
<html>
<style>
    html{
        background-color: #f1d9d9;
        color: black;
    }
</style>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
</head>
<body>

<img src=".admin.png" style="width: 10%">
<br>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{route('enseignantHome')}}">ENSEIGNANT : {{ Auth::user()->nom}}</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('enseignantProfil')}}">Profil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('mesCours')}}">Mes cours</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
            <li class="nav-item active" style="margin-left: 700px">
                <a class="nav-link" href="{{route('adminHome')}}">Admin</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
        </ul>
    </div>
</nav>
<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 100px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" >PRESENCES</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('inscritsCoursList1')}}">Inscrits-Cours</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('getSeanceCours1')}}">POINTAGE</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('listAP1')}}">Absents/Présents</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('coursTotaux')}}">Totaux de présences par cours</a>
            </li>
        </ul>
    </div>
</nav>

{{--Message flash d'erreurs--}}
@if ($errors->any())
    <div class="alert alert-danger" role="alert" style="text-align: center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--Message flash--}}

@if( session()->has('state'))
    <div class="alert alert-info" role="alert" style="text-align: center">
        <p class="state">{{session()->get('state')}}</p>
    </div>
@endif


@yield('content')

</body>

</html>
