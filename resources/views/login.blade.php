@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row form-group">
        <div class="col-md-6 col-md-offset-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6 col-md-offset-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6 col-md-offset-3">
            <input type="checkbox" name="remember-me" id="remember-me">
            <label for="remember-me">Remember me</label>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6 col-md-offset-3 text-right">
            <button type="button" class="post-btn btn btn-primary">Login</button>
        </div>
    </div>
@endsection
