@extends('modele.gestionnaire')

@section('title','Liste détaillée de présences par étudiant')

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
            <th>Cours</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->nom}}</td>
                <td>{{$e->prenom}}</td>
                <td>{{$e->noet}}</td>
                <td>{{$e->created_at}}</td>
                <td>{{$e->updated_at}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('lpde2',['eid'=>$e->id])}}">List</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
