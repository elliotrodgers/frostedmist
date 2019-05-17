@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group">
            <label for="image">Image</label>
            <img class="mb-3" id="image-preview" src="" width="100%">
            <br>
            <input type="file" name="image" id="image" accept="image/*" onchange="$('#image-preview').attr('src', window.URL.createObjectURL(this.files[0]));" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group text-right">
            <button type="button" class="btn btn-primary" name="post" id="post" onclick="post()">Post</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function post() {

            var title = $('#title').val();
            var image = $('#image').prop('files')[0];
            var body = $('#body').val();

            var valid = true;

            if(title === '') {
                $('#title').addClass('is-invalid');
                valid = false;
            } else {
                $('#title').removeClass('is-invalid');
            }

            if(image == null) {
                $('#image').addClass('is-invalid');
                valid = false;
            } else {
                $('#image').removeClass('is-invalid');
            }

            if(body === '') {
                $('#body').addClass('is-invalid');
                valid = false;
            } else {
                $('#body').removeClass('is-invalid');
            }

            if(valid) {
                $('#post').prop('disabled', true);

                $.ajax({
                    url: "{{ config('links.createPost') }}",
                    method: 'POST',
                    data: {
                        title: title,
                        image_name: image.name,
                        body: body
                    },
                    success: function (presignedUrl) {
                        $.ajax({
                            url: presignedUrl,
                            type: 'PUT',
                            data: image,
                            contentType: image.type,
                            processData: false,
                            success: function (response) {
                                window.location = "{{ config('links.gallery') }}";
                            }
                        });
                    }
                });
            }
        }
    </script>
@endsection