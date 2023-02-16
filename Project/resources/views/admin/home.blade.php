@extends('modele.modele')

@section('title','ADMIN HOME')

@section('content')
    <style>
        body{
            background-color: #f1d9d9;
            color: black;
        }
    </style>
    <body>
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

    <br>


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
                    <a class="nav-link" href="{{route('usersList')}}">Liste intégrale</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('searchUser')}}">Recherche</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
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
                    <a class="nav-link" href="{{route('createUserForm')}}">Add</a>
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
    </body>
@endsection
