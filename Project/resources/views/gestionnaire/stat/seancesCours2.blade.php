@extends('modele.gestionnaire')

@section('title','Seances List')

@section('content')
    <style>
        table, th, td ,h6{
            text-align: center;
        }
        body{
            background-color: #f1d9d9;
            color: black;
        }
    </style>

    <body>
    <br>
    <h6><strong>Séance(s) du cours {{$cours->intitule}}</strong></h6>
    <br>
    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>CoursID</th>
            <th>Début</th>
            <th>Fin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seances as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->cours_id}}</td>
                <td>{{$s->date_debut}}</td>
                <td>{{$s->date_fin}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$seances->links()}}
    </body>
@endsection
