<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    @vite('resources/css/app.css')
</head>
<body>
@yield('navbar')

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
            <h2><i class="fa fa-sitemap"></i> ToucanTech</h2>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ route('schools.index') }}"><i style="font-size:18px;color:black"></i>Schools</a></li>
                <li><a href="{{ route('profiles.index')}}"><i style="font-size:18px"></i>Profiles</a></li>
                <li><a href="{{ route('profiles.add')}}"><i style="font-size:18px"></i>Add member</a></li>
            </ul><br>
        </div><br>

        <div class="col-sm-9 tab-content">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
