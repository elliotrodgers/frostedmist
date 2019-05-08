<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>frostedmist</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    @yield('scripts')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Press Start 2P', sans-serif;
            height: 100vh;
            margin: 0;
        }

        .title {
            font-size: 30px;
            margin-top: 15px;
        }

        .content-title {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .post-title {
            font-size: 20px;
        }

        .link-button {
            float: right;
            margin: 5px;
            font-size: 25px;
            font-family: sans-serif;
        }

        .post-image {
            width: 100%;
        }

        .container, .post, .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-12" style="text-align: center; cursor: pointer" onclick="window.location = '/Prod/';">
            <div class="title"><b>frostedmist</b></div>
            <div class="post-title">pixel art and stories</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="link-button btn btn-primary" title="patreon" onclick="window.open('https://patreon.com/frostedmist', '_blank')"><span class="fab fa-patreon"></span></div>
            <div class="link-button btn btn-primary" title="twitter" onclick="window.open('https://twitter.com/frostedmist', '_blank')"><span class="fab fa-twitter"></span></div>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="content-title"><b>@yield('title')</b></div>
        </div>
    </div>
    @yield('content')
</div>
</body>
</html>
