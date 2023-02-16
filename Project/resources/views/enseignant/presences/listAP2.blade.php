@extends('modele.enseignant')

@section('title','Seances')

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
    <h6><strong>Cours - {{$cours->intitule}}</strong></h6>
    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>CoursID</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Présents</th>
            <th>Absents</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seances as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->cours_id}}</td>
                <td>{{$s->date_debut}}</td>
                <td>{{$s->date_fin}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('listP',['sid'=>$s->id])}}">LIST</a></td>
                <td><a type="button" class="btn btn-info" href="{{route('listA',['sid'=>$s->id, 'cid'=>$cours->id])}}">LIST</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
