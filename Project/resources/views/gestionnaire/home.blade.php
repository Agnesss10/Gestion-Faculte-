@extends('modele.modele')

@section('title','GESTIONNAIRE HOME')

@section('content')
    <style>
        body{
            background-color: #f1d9d9;
            color: black;
        }
    </style>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{route('gestionnaireHome')}}">GESTIONNAIRE : {{ Auth::user()->nom}}</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('gestionnaireProfil')}}">Profil</a>
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 100px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" >ETUDIANTS</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('etudiantsList')}}">List</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('searchEtudiant')}}">Recherche</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('createEtudiantForm')}}">ADD</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('assoEtuCouList1')}}">Association E-Cours</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('deleteEtuAssoA')}}">Supprimer Asso-E-Cours</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('listEtuDeCours1')}}">List E-Cours</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('etudiantList')}}">Pagination-List</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('editEtu1')}}">MAJ</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('delete1')}}">Supprimer</a>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 100px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" >SEANCES</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('createSeance')}}">ADD</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('seancesCours1')}}">Séances-Cours</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('editSeanceA')}}">Edit</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('deleteSeanceA')}}">Supprimer</a>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 100px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" >ENSEIGNANTS</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('assoEnsCouList1')}}">Association E-C</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('listEnsDeCoursA')}}">Suppression Association E-Cours</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('listEnsDeCours1')}}">List E-Cours</a>
                </li>
            </ul>
        </div>

    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 100px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" >COURS</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('coursListe')}}">List</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('lesCours')}}">Copier les associations d'étudiants d'un cours vers un autre</a>
                </li>
            </ul>
        </div>
    </nav>
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
                    <a class="nav-link" href="{{route('lpde1')}}">List des présences détaillées (par étudiant)</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('lpds1')}}">List des présences des étudiants (par séance)</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link">|</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('lpdc1')}}">List des présences des étudiants (par cours)</a>
                </li>
            </ul>
        </div>
    </nav>
    </body>
@endsection
