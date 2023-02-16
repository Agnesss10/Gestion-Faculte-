@extends('modele.gestionnaire')

@section('title','MAJ Etudiants')

@section('content')
    <style>
        table, th, td {
            text-align: center;
        }
        body{
            background-color: #f1d9d9;
            color: black;
        }
    </style>

    <body>
    <br>
    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>N° étudiant</th>
            <th>Créé le</th>
            <th>Mis à jour le</th>
            <th>Mettre à jour</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $etudiant)
            <tr>
                <td>{{$etudiant->id}}</td>
                <td>{{$etudiant->nom}}</td>
                <td>{{$etudiant->prenom}}</td>
                <td>{{$etudiant->noet}}</td>
                <td>{{$etudiant->created_at}}</td>
                <td>{{$etudiant->updated_at}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('editEtu2',['eid'=>$etudiant->id])}}">MAJ</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
