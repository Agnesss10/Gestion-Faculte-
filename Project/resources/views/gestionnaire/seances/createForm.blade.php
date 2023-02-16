@extends('modele.gestionnaire')

@section('title','Create Séance')

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
    <form action="{{route('createS',['cid'=>$c->id])}}" method="post">
        <div class="form-group row">
            <label for="intitule" class="col-sm-2 col-form-label">Intitulé du cours</label>
            <div class="col-sm-10">
                <input type="text" name="intitule" class="form-control" value="{{$c->intitule}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="cours_id" class="col-sm-2 col-form-label">ID Cours</label>
            <div class="col-sm-10">
                <input type="text" name="cours_id" class="form-control" value="{{$c->id}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="date_debut" class="col-sm-2 col-form-label">Date début</label>
            <div class="col-sm-10">
                <input type="datetime-local" name="date_debut" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="date_fin" class="col-sm-2 col-form-label">Date fin</label>
            <div class="col-sm-10">
                <input type="datetime-local" name="date_fin" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Add</button>
            </div>
        </div>

        @csrf
    </form>


    </body>

@endsection
