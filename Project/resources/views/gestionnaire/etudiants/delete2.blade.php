@extends('modele.gestionnaire')

@section('title','Supprimer Etudiant')

@section('content')
    <style>
        body{
            background-color: #f1d9d9;
            color: black;
        }
        form{
            text-align: center;
            margin-left: 300px;
        }
        .form-control{
            width: 50%;
        }
        button{
            width: 150px;
        }
    </style>
    <body>

    <br>
    <form method="post" action="{{route('delete3',['eid'=>$etudiant->id])}}">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" value="{{$etudiant->nom}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" value="{{$etudiant->prenom}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="noet" class="col-sm-2 col-form-label">Numéro étudiant</label>
            <div class="col-sm-10">
                <input type="text" name="noet" class="form-control" value="{{$etudiant->noet}}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Supprimer</button>
            </div>
        </div>

        @csrf
    </form>


    </body>

@endsection
