<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
@include('layouts.navbar')
<body style="color: #636b6f;">
<div class="container mt-4">
    <div class="row">
        <a class="col-12 col-md-4" title="gallery" href="{{ config('links.gallery') }}" style="text-decoration: none; color: #636b6f;">
            <h1><b>frostedmist</b></h1>
            <h4>pixel art and stories</h4>
        </a>
        <div class="col-8 d-none d-md-block text-right">
            <a class="btn btn-outline-primary m-1" title="gallery" href="{{ config('links.gallery') }}">gallery</a>
            <a class="btn btn-outline-primary m-1" title="login" href="{{ config('links.login') }}">login</a>
            <a class="btn btn-outline-primary m-1" title="create post" href="{{ config('links.createPost') }}">create post</a>
            <a class="btn btn-outline-primary m-1" title="patreon" href="https://patreon.com/frostedmist" target="_blank">
                <span class="fab fa-patreon"></span>
            </a>
            <a class="btn btn-outline-primary m-1" title="twitter" href="https://twitter.com/frostedmist" target="_blank">
                <span class="fab fa-twitter"></span>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <hr>
        </div>
    </div>
</div>
<div class="container mt-4">
    @include('layouts.title')
    @yield('content')
</div>
@include('layouts.scripts')
@yield('scripts')
</body>
</html>
