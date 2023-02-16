@extends('modele.gestionnaire')

@section('title','Create Etudiant')

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
    <form action="{{route('createEtudiant')}}" method="post">
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
            <label for="noet" class="col-sm-2 col-form-label">Numéro étudiant</label>
            <div class="col-sm-10">
                <input type="text" name="noet" class="form-control" placeholder="Numéro étudiant">
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
