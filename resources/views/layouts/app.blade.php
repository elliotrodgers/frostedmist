<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
@include('layouts.navbar')
<body>
<div class="container-fluid mt-4" style="color: #636b6f;">
    <div class="row">
        <div class="col-12 col-md-4" onclick="window.location = '/Prod/';" style="cursor: pointer">
            <h1><b>frostedmist</b></h1>
            <h4>pixel art and stories</h4>
        </div>
        <div class="col-8 d-none d-md-block text-right">
            <button type="button" class="btn btn-outline-primary m-1" onclick="window.location = '/Prod/'">Gallery</button>
            <button type="button" class="btn btn-outline-primary m-1" onclick="window.location = 'login'">Login</button>
            <button type="button" class="btn btn-outline-primary m-1" onclick="window.location = 'createPost'">Create Post</button>
            <button type="button" class="btn btn-outline-primary m-1" title="patreon"
                    onclick="window.open('https://patreon.com/frostedmist', '_blank')">
                <span class="fab fa-patreon"></span>
            </button>
            <button type="button" class="btn btn-outline-primary m-1" title="twitter"
                    onclick="window.open('https://twitter.com/frostedmist', '_blank')">
                <span class="fab fa-twitter"></span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>
    @hasSection('title')
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <h4><b>@yield('title')</b></h4>
        </div>
    </div>
    @endif
    @yield('content')
    @yield('scripts')
</div>
</body>
</html>
