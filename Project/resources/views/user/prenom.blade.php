@extends('modele.modele')

@section('title','Edit Prénom')

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
    <form action="{{route('editPrenom', ['id'=>$id])}}" method="post">
        <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label"> Prénom actuel </label>
            <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" placeholder="{{Auth::user()->prenom}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label"> Nouveau prénom </label>
            <div class="col-sm-10">
                <input type="text" name="newprenom" class="form-control" placeholder="Nouveau prénom">
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
