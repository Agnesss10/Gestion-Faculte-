@extends('modele.gestionnaire')

@section('title','Association Enseignant-Cours')

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
    <h6 style="text-align: center"><strong>Association de l'enseignant {{$e->nom}} à un cours</strong></h6>
    <br>
    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Intitulé</th>
            <th>To associate</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cours as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->intitule}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('assoEnsCou1',['eid'=>$e->id,'cid'=>$c->id])}}">To associate</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
