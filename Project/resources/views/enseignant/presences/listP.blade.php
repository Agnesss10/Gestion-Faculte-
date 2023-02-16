@extends('modele.enseignant')

@section('title','Présents')

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
        </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $et)
            <tr>
                <td>{{$et->id}}</td>
                <td>{{$et->nom}}</td>
                <td>{{$et->prenom}}</td>
                <td>{{$et->noet}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
