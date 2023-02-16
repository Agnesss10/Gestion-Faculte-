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
<a type="button" class="btn btn-info" href="{{route('adminHome')}}">BACK</a>
<br>

<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{route('adminHome')}}">ADMIN : {{ Auth::user()->nom}}</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('adminProfil')}}">Profil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
            <li class="nav-item active" style="margin-left: 700px">
                <a class="nav-link" href="{{route('gestionnaireHome')}}">GESTIONNAIRE</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('enseignantHome')}}">ENSEIGNANT</a>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 100px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand">USERS</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('usersList')}}">List</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('searchUser')}}">Recherche</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li><li class="nav-item active">
                <a class="nav-link" href="{{route('gestionnaireList')}}">Gestionnaires</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('enseignantList')}}">Enseignants</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('toValidate')}}">To Validate</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('createUserForm')}}">Add User</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('editUser1')}}">MAJ</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('deleteUser1')}}">Supprimer</a>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 100px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand">COURS</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('coursList')}}">List</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('searchCours')}}">Recherche</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('createCoursForm')}}">Add</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('editCours1')}}">MAJ</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">|</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('delCours1')}}">Supprimer</a>
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
