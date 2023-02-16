@extends('modele.gestionnaire')

@section('title','Association de plusieurs étudiants')

@section('content')
    <style>
        table, th, td, h6{
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

    <form action="{{route('C',['cid'=>$cours->id])}}" method="post">
        <div class="form-group row" style="margin-left: 300px">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Associate</button>
            </div>
        </div>


    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>N° étudiant</th>
            <th>Créé le</th>
            <th>Mis à jour le</th>
            <th>Associer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->nom}}</td>
                <td>{{$e->prenom}}</td>
                <td>{{$e->noet}}</td>
                <td>{{$e->created_at}}</td>
                <td>{{$e->updated_at}}</td>
                <td>
                    <div>
                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="Associer" name="Asso">
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    @csrf
    </form>
    </body>
@endsection
