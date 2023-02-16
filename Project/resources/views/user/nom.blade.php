@extends('modele.modele')

@section('title','Edit Nom')

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
    <form action="{{route('editNom', ['id'=>$id])}}" method="post">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label"> Nom actuel </label>
            <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" placeholder="{{Auth::user()->nom}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label"> Nouveau nom </label>
            <div class="col-sm-10">
                <input type="text" name="newnom" class="form-control" placeholder="Nouveau nom">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="Edit" class="btn btn-info">Edit</button>
            </div>
            <div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" name="Cancel" class="btn btn-info">Cancel</button>
                    </div>
                    <div>
        @csrf
    </form>
    </body>
@endsection
