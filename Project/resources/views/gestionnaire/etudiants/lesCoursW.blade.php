@extends('modele.gestionnaire')

@section('title','Copier toutes les associations (etudiants)')

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
    <br><br>
    <h6><strong>Cours - {{$co->intitule}}</strong></h6>

    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Intitulé</th>
            <th>To copy</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cours as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->intitule}}</td>
                <td><a type="button" class="btn btn-info" href="{{route('copierAssoForm',['cid1'=>$co->id, 'cid2'=>$c->id])}}">Copy to</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
