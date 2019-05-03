<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>frostedmist</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .content {
            padding: 20px 20px 0px 20px;
        }

        .header {
            display: flex;
            padding-bottom: 20px;
        }

        .logo {
            flex: 0 0 65%;
        }

        .title {
            font-size: 60px;
            font-weight: bold;
        }

        .sub-title {
            font-size: 30px;
        }

        .links {
            flex: 1;
        }

        .link-button {
            float: right;
            background: #38A1F3;
            border-radius: 5px;
            padding: 7px;
            margin: 5px;
        }

        .link-button > a {
            color: white;
            font-size: 30px;
        }

        .body {
            align-content: center;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="header">
        <div class="logo">
            <div class="title">frostedmist</div>
            <div class="sub-title">pixel art and stories</div>
        </div>
        <div class="links">
            <div class="link-button">
                <a href="https://patreon.com/frostedmist" title="patreon" target="_blank"><i class="fab fa-patreon"></i></a>
            </div>
            <div class="link-button">
                <a href="https://twitter.com/frostedmist" title="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="body">
        @yield('content')
    </div>
</div>
</body>
</html>
