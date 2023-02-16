@extends('modele.gestionnaire')

@section('title','Assocation Enseignants-Cours')

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
    <form action="{{route('assoEnsCou',['eid'=>$e->id,'cid'=>$c->id])}}" method="post">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom de l'enseignant</label>
            <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" value="{{$e->nom}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="intitule" class="col-sm-2 col-form-label">Intitulé du cours</label>
            <div class="col-sm-10">
                <input type="text" name="intitule" class="form-control" value="{{$c->intitule}}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Associate</button>
            </div>
        </div>

        @csrf
    </form>


    </body>

@endsection
