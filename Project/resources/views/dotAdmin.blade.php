@extends('modele.modele')

@section('title','.ADMIN')

@section('content')
    <style>
        body{
            background-color: #f1d9d9;
        }
        a[type=button]{
            width: 120px;
        }
    </style>
    <body>
    <br>
    <img src=".register.png" alt="register" style="width: 15%; margin-left: 300px;">

    <a type="button" class="btn btn-info" href="{{route('register')}}" style="margin-left: 100px"> REGISTER </a>

    <a type="button" class="btn btn-info" href="{{route('login')}}" style="margin-left: 610px;"> LOG IN </a>
    <img src=".login.png" alt="login" style="width: 15%; margin-left: 800px;">



    </body>
<tfoot>
    <center>
        <br><br>
        <a type="button" class="btn btn-info" href="{{route('aboutUs')}}"> ABOUT US</a>
    </center>
</tfoot>

@endsection
