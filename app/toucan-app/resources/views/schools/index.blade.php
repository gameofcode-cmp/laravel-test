<html lang="en">
<head>
    <title>Bootstrap Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-sitemap" style="font-size:18px;color:black"></i> ToucanTech</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a data-toggle="tab" href="#Dash">Dashboard</a></li>
                <li><a data-toggle="tab" href="#Age">Age</a></li>
                <li><a data-toggle="tab" href="#Gender">Gender</a></li>
                <li><a data-toggle="tab" href="#Geo">Geo</a></li>
                <li><a data-toggle="tab" href="#Street">Street View</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
            <h2><i class="fa fa-sitemap"></i> ToucanTech</h2>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="tab" href="#Dash">Dashboard</a></li>
                <li><a data-toggle="tab" href="#Age"><i class="fa fa-school" style="font-size:18px;color:black"></i> Schools</a></li>
                <li><a data-toggle="tab" href="#Gender"><i class="fa fa-venus-mars" style="font-size:18px"></i> Users</a></li>
            </ul><br>
        </div><br>

        <div class="col-sm-9 tab-content">
            <div class="container">
                <h1>Schools</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schools as $school)
                    <tr>
                        <td>{{ $school->Name }}</td>
                        <td>{{ $school->Country }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>

