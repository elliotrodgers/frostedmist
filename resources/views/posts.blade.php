
@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @foreach ($posts as $post)
        <h3>{{ $post['title'] }} ({{ date('d/m/Y', strtotime($post['date_created'])) }})</h3>
        <p>{{ $post['body'] }}</p>
        <img src="{{ $post['image'] }}" style="width:100%; max-width:500px; max-height:500px">
    @endforeach
@endsection
