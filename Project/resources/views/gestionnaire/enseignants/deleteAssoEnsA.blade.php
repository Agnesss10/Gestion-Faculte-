@extends('modele.gestionnaire')

@section('title','Suppression Association Enseignant-Cours')

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
            <th>To dessociate</th>
        </tr>
        </thead>
        <tbody>
        @foreach($enseignants as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->nom}}</td>
                <td>{{$e->prenom}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('listEnsDeCoursB',['eid'=>$e->id])}}">Dessociate</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
