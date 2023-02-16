@extends('modele.gestionnaire')

@section('title','Liste détaillée de présences par séance')

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
    <br>
    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Cours ID</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Etudiants</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seances as $seance)
            <tr>
                <td>{{$seance->id}}</td>
                <td>{{$seance->cours_id}}</td>
                <td>{{$seance->date_debut}}</td>
                <td>{{$seance->date_fin}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('lpds3',['sid'=>$seance->id, 'cid'=>$cours->id])}}">List</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
