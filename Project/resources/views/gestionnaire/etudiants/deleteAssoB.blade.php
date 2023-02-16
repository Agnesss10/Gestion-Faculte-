@extends('modele.gestionnaire')

@section('title','Supprimer Asso-Etudiant-Cours')

@section('content')
    <style>
        table, th, td , h6{
            text-align: center;
        }
        body{
            background-color: #f1d9d9;
            color: black;
        }
    </style>

    <body>
    <br>
    <h6><strong>Déssociation de l'étudiant {{$e->nom}} à un cours</strong></h6>
<br>
    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Intitulé</th>
            <th>To dessociate</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cours as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->intitule}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('deleteEtuAssoC',['eid'=>$e->id,'cid'=>$c->id])}}">Dessociate</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
