@extends('modele.modele')

@section('title','Edit Password')

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
    <form action="{{route('editPassword', ['id'=>$id])}}" method="post">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label"> Mot de passe actuel </label>
            <div class="col-sm-10">
                <input type="password" name="mdp" class="form-control" placeholder="Mot de passe actuel">
            </div>
        </div>
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label"> Nouveau mot de passe </label>
            <div class="col-sm-10">
                <input type="password" name="newpassword" class="form-control" placeholder="Nouveau mot de passe">
            </div>
        </div>
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label"> Confirmation du mot de passe </label>
            <div class="col-sm-10">
                <input type="password" name="newpassword" class="form-control" placeholder="Confirmation du mot de passe">
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
