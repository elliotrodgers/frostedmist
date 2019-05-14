@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="row form-group">
        <div class="col-md-6 offset-md-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6 offset-md-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" accept=".png,.jpg">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6 offset-md-3">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6 offset-md-3 text-right">
            <button type="button" class="post-btn btn btn-primary">Post</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".post-btn").click(function () {
                alert("The button was clicked.");
            });
        });
    </script>
@endsection