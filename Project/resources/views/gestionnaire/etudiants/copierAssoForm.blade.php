@extends('modele.admin')

@section('title','Copier toutes les associations (etudiants)')

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
    <form action="{{route('copierAsso',['cid1'=>$cours1->id, 'cid2'=>$cours2->id])}}" method="post">
        <div class="form-group row">
            <label for="intitule" class="col-sm-2 col-form-label">Intitulé du premier cours</label>
            <div class="col-sm-10">
                <input type="text" name="intitule" class="form-control"  value="{{$cours1->intitule}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="intitule" class="col-sm-2 col-form-label">Intitulé du cours auquel on y copie</label>
            <div class="col-sm-10">
                <input type="text" name="intitule" class="form-control"  value="{{$cours2->intitule}}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Copy</button>
            </div>
        </div>

        @csrf
    </form>


    </body>

@endsection
