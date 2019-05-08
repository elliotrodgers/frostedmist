@extends('layouts.app')

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".post-btn").click(function () {
                alert("The button was clicked.");
            });
        });
    </script>
@endsection

@section('title', 'Create Post')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" accept=".png,.jpg" style="font-family: sans-serif;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-right">
            <button type="button" class="post-btn btn btn-primary" style="text-align:center">Post</button>
        </div>
    </div>
@endsection
