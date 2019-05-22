<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
@include('layouts.head')
<style>
    html, body {
        height: 100%;
    }
</style>
<body style="color: #636b6f;">
<header class="mt-4">
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <a title="gallery" href="{{ config('links.gallery') }}" style="text-decoration: none; color: #636b6f;">
                    <h1><b>frostedmist</b></h1>
                    <h4>pixel art and stories</h4>
                </a>
            </div>
            <div class="col-8 d-none d-md-block text-right">
                @include('layouts.navbuttons')
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
</header>
<div class="container mt-4" style="margin-bottom: 60px">
    @include('layouts.title')
    @include('layouts.errors')
    @yield('content')
</div>
<footer class="bg-dark text-white position-fixed" style="bottom: 0; width: 100%">
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-12 text-right small align-self-end">
                Created by <a href="https://github.com/elliot-rodgers" target="_blank" class="text-white">Elliot Rodgers</a> |
                <a href="https://github.com/elliot-rodgers/frostedmist" target="_blank" class="text-white">Source</a>
            </div>
        </div>
    </div>
</footer>
@include('layouts.scripts')
@yield('scripts')
</body>
</html>
