@extends('modele.admin')

@section('title','Cours List')

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
            <th>Créé le</th>
            <th>Mis à jour le</th>
            <th>MAJ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cours as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->intitule}}</td>
                <td>{{$c->created_at}}</td>
                <td>{{$c->updated_at}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('editCours2',['cid'=>$c->id])}}">MAJ</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
