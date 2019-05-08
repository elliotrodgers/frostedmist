@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    @foreach ($posts as $post)
        <div class="post">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="post-title">{{ $post['title'] }}</div>
                    <p>{{ date('d/m/Y h:i', strtotime($post['date_created'])) }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <img class="post-image" src="{{ $post['image'] }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <p>{{ $post['body'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
