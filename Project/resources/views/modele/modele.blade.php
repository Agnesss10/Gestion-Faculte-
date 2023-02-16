<!DOCTYPE html>
<html>
<style>
    html{
        background-color: #f1d9d9;
        color: black;

    }
</style>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
</head>
<body>

<img src=".admin.png" style="width: 10%">

{{--Message flash d'erreurs--}}
@if ($errors->any())
    <div class="alert alert-danger" role="alert" style="text-align: center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--Message flash--}}

@if( session()->has('state'))
    <div class="alert alert-info" role="alert" style="text-align: center">
        <p class="state">{{session()->get('state')}}</p>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-block" style="text-align: center">
        <strong>{{session()->get('success')}}</strong>
    </div>
@endif

@yield('content')

</body>

</html>
