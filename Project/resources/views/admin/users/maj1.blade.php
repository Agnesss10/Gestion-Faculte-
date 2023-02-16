@extends('modele.admin')

@section('title','Users List')

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
            <th>Type</th>
            <th>MAJ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->nom}}</td>
                <td>{{$u->prenom}}</td>
                <td>{{$u->login}}</td>
                <td>{{$u->type}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('editUser2',['id'=>$u->id])}}">MAJ</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
