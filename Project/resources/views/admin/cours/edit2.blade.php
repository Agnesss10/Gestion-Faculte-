@extends('modele.admin')

@section('title','Edit Cours')

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
    <form action="{{route('editCours3',['cid'=>$cours->id])}}" method="post">
        <div class="form-group row">
            <label for="intitule" class="col-sm-2 col-form-label">Intitulé</label>
            <div class="col-sm-10">
                <input type="text" name="intitule" class="form-control"  value="{{$cours->intitule}}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Edit</button>
            </div>
        </div>

        @csrf
    </form>


    </body>

@endsection
