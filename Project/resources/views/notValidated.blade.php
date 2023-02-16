@extends('modele.modele')

@section('title','ADMIN HOME')

@section('content')
    <style>
        body{
            background-color: #f1d9d9;
            color: black;
        }
    </style>
    <body>
        <center>
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p> Vous vous êtes bien inscrit ! </p>
                <hr>
                <p class="mb-0">Cependant vous devez attendre la validation de l'Admin afin d'accéder à votre compte.</p>
            </div>
            <a type="button" class="btn btn-info" href="{{route('.admin')}}">BACK</a>
        </center>

    </body>
@endsection
