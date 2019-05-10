<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>frostedmist</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-bottom: 20px; color: #636b6f;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12 text-center" role="button" onclick="window.location = '/Prod/';">
            <h1><b>frostedmist</b></h1>
            <h4>pixel art and stories</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12 text-center">
            <div class="link-button btn btn-primary btn-lg" title="patreon" style="margin: 5px"
                 onclick="window.open('https://patreon.com/frostedmist', '_blank')">
                 <span class="fab fa-patreon"></span>
            </div>
            <div class="link-button btn btn-primary btn-lg" title="twitter" style="margin: 5px"
                 onclick="window.open('https://twitter.com/frostedmist', '_blank')">
                 <span class="fab fa-twitter"></span>
            </div>
            <div class="link-button btn btn-primary btn-lg" title="login" style="margin: 5px"
                 onclick="window.location = 'login'">
                 <span class="fas fa-sign-in-alt"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    @hasSection('title')
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h4><b>@yield('title')</b></h4>
            </div>
        </div>
    @endif
    @yield('content')
    @yield('scripts')
</div>
</body>
</html>
