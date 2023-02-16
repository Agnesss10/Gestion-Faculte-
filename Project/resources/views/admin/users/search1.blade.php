@extends('modele.admin')

@section('title','Recherche User')

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
    <form action="{{route('searchU')}}" method="post">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" placeholder="Nom">
            </div>
        </div>
        <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control" placeholder="Prénom">
            </div>
        </div>

        <div class="form-group row">
            <label for="login" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
                <input type="text" name="login" class="form-control" placeholder="Login">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Recherche</button>
            </div>
        </div>

        @csrf
    </form>


    </body>

@endsection
