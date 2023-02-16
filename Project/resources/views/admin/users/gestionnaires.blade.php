@extends('modele.admin')

@section('title','Gestionnaires List')

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
            <th>Login</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->nom}}</td>
                <td>{{$u->prenom}}</td>
                <td>{{$u->login}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
