@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <form method="POST" action="{{ config('links.login') }}">
        <div class="row">
            <div class="col-md-6 offset-md-3 form-group">
                <label for="pin">Pin</label>
                <input type="password" class="form-control {{ $errors->has('pin') ? 'is-invalid' : '' }}" name="pin" id="pin">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 form-group text-right">
                <button type="submit" class="btn btn-primary" name="post" id="post">Login</button>
            </div>
        </div>
    </form>
@endsection
