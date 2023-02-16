@extends('modele.gestionnaire')

@section('title','Association Etudiants-Cours List')

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
            <th>To associate</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->nom}}</td>
                <td>{{$e->prenom}}</td>
                <td>{{$e->noet}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('assoEtuCouList2',['eid'=>$e->id])}}">To associate</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
