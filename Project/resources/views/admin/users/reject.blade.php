@extends('modele.admin')

@section('title','MAJ Type')

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
    <form action="{{route('rejectUser',['id'=>$user->id])}}" method="post">
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">L'utilisateur </label>
            <div class="col-sm-10">
                <input type="text" name="nom" class="form-control" value="{{$user->nom}}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Reject</button>
            </div>
            <div>
        @csrf
    </form>
    </body>
@endsection
