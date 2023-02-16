@extends('modele.admin')

@section('title','Create User')

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

    <a type="button" class="btn btn-info" href="{{route('adminHome')}}">BACK</a>
    <br>


    <br>
    <form action="{{route('createUser')}}" method="post">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" placeholder="Nom"  value="{{old('nom')}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" placeholder="Prénom" value="{{old('prenom')}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <input type="text" name="type" class="form-control" placeholder=" admin, enseignant ou gestionnaire">
            </div>
        </div>

        <div class="form-group row">
            <label for="login" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
                <input type="text" name="login" class="form-control" placeholder="Login" value="{{old('login')}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
            </div>
        </div>

        <div class="form-group row">
            <label for="mdp_confirmation" class="col-sm-2 col-form-label">Confirmation Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" name="mdp_confirmation" class="form-control" placeholder="Confirmation Mot de passe">
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
