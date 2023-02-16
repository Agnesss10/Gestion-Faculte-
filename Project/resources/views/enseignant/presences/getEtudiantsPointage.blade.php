@extends('modele.enseignant')

@section('title','Pointage')

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
    <h6><strong>Cours - {{$cours->intitule}} | Séance ID - {{$seance->id}}</strong></h6>

    <table class="table table-sm table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>N° étudiant</th>
            <th>Présent</th>
            <th>Absent</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->nom}}</td>
                <td>{{$e->prenom}}</td>
                <td>{{$e->noet}}</td>
                <td>
                    <form action="{{route('pointage',['eid'=>$e->id, 'sid'=>$seance->id])}}" method="post">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info" name="Présent">Présent</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </td>
                <td>
                    <form action="{{route('pointage',['eid'=>$e->id, 'sid'=>$seance->id])}}" method="post">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info" name="Absent">Absent</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
@endsection
