@extends('modele.gestionnaire')

@section('title','Profil')

@section('content')
    <style>
        body{
            background-color: #f1d9d9;
            color: black;
        }
        table, td, tr{
            text-align: center;
            width: 30%;
        }
    </style>
    <body>
    </center>

    <br><br>
    <table class="table table-sm">
        <tr>
            <td>ID</td>
            <td>{{Auth::user()->id}}</td>
        </tr>
        <tr>
            <td>Nom</td>
            <td>{{Auth::user()->nom}}</td>
            <td><a type="button" class="btn btn-info" href="{{route('nomForm')}}">MAJ</a></td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td>{{Auth::user()->prenom}}</td>
            <td><a type="button" class="btn btn-info" href="{{route('prenomForm')}}">MAJ</a></td>
        </tr>
        <tr>
            <td>Type</td>
            <td>{{Auth::user()->type}}</td>
        </tr>
        <tr>
            <td>Mot de passe</td>
            <td></td>
            <td><a type="button" class="btn btn-info" href="{{route('passwordForm')}}">MAJ</a></td>
        </tr>
        </tbody>
    </table>
    <center>
    </body>
@endsection
