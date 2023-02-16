@extends('modele.modele')

@section('title','Log In')

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
<a type="button" class="btn btn-info" href="{{route('.admin')}}">BACK</a>
<br>

<form method="post" action="{{route('login')}}">
    <br>

    <div class="form-group row">
        <label for="login"  class="col-sm-2 col-form-label">Login</label>
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
        <div class="col-sm-10">
            <button type="submit" class="btn btn-info">Log In</button>
        </div>
    </div>

@csrf <!--PROTECTION CSRF-->
</form>
</body>

@endsection
