@extends('modele.gestionnaire')

@section('title','Liste détaillée de présences par étudiant')

@section('content')
    <style>
        table, th, td, h6 {
            text-align: center;
        }
        body{
            background-color: #f1d9d9;
            color: black;
        }
    </style>

    <body>
    <br>
    <h6><strong>Etudiant - {{$e->nom}}</strong></h6>
    <br>
    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Intitulé</th>
            <th>Nb de séances</th>
            <th>Présences</th>
            <th>Absences</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cours as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->intitule}}</td>
                <td>{{$c->seance->count()}}</td>
                <td>{{$e->seances->where('cours_id',$c->id)->count()}}</td>
                <td>{{$c->seance->count() - $e->seances->where('cours_id',$c->id)->count()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
