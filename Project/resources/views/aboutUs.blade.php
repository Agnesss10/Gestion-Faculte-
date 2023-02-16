@extends('modele.modele')

@section('title','About us')

@section('content')
    <style>
        body{
            background-color: #f1d9d9;
        }
    </style>

    <body>
    <a type="button" class="btn btn-info" href="{{route('.admin')}}">BACK</a>
    <br>

    <div class="alert alert-primary" role="alert" style="text-align: center">
        <h4 class="alert-heading"> ABOUT US</h4>
        <p>
            Ce site a pour but de dématérialiser la gestion des présences des étudiants en séances des cours.
        </p>
        <hr>
        <p class="mb-0">
            Il y a 3 acteurs qui gèrent le site:
            <a href="" class="alert-link">Administrateur</a> -
            <a href="" class="alert-link">Gestionnaire</a> -
            <a href="" class="alert-link">Enseignant</a>
        </p>
        <hr>
        <p class="mb-0">
            <a href="" class="alert-link">Administrateur</a><br>
            <p>
                Il effectue les tâches des gestionnaires ainsi que celles des enseignants.<br>
                Il gère les utilisateurs (listes - validation des inscrits - ajout - modification - suppression).<br>
                Il s'occupe également des cours (liste - ajout - modification - suppression).
            </p>
        </p>
        <hr>
        <p class="mb-0">
            <a href="" class="alert-link">Gestionnaire</a><br>
        <p>
            Il gère les étudiants (listes - ajout - modification - suppression - association à un cours).<br>
            Il s'occupe également des séances (liste - ajout - modification - suppression).<br>
            Il gère aussi les enseignants (association/dissociation à un cours - listes).<br>
            On trouvera également liste des cours ainsi que les listes des présences.
        </p>
        </p>
        <hr>
        <p class="mb-0">
            <a href="" class="alert-link">Enseignant</a><br>
        <p>
            Il gère le pointage des étudiants pour une séance d'un cours.<br>
            Il a également la liste des inscrits pour un cours.<br>
            On y trouve aussi les listes d'absents et présents ainsi que les totaux de présences par cours.
        </p>
        </p>
    </div>

    </body>
@endsection
