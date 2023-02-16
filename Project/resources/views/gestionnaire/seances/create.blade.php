@extends('modele.gestionnaire')

@section('title','Create Séance')

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
            <th>Intitulé</th>
            <th>Ajouter une séance</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cours as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->intitule}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('createSeanceForm',['id'=>$c->id])}}">ADD</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
