@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $post['title'] }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group">
            <label for="image">Image</label>
            <img class="mb-3" id="image-preview" src="{{ config('links.cloudFront') . $post['image_name'] }}" width="100%">
            <br>
            <input type="file" name="image" id="image" accept="image/*" onchange="$('#image-preview').attr('src', window.URL.createObjectURL(this.files[0]));" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $post['body'] }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 form-group text-right">
            <button type="button" class="btn btn-primary" name="edit" id="edit" onclick="edit()">Edit</button>
        </div>
    </div>
    <input type="hidden" id="pid" value="{{ $post['pid'] }}">
    <input type="hidden" id="image-name" value="{{ $post['image_name'] }}">
@endsection

@section('scripts')
    <script>
        function edit() {

            var pid = $('#pid').val();
            var title = $('#title').val();
            var image = $('#image').prop('files')[0];
            var image_name = null;
            var body = $('#body').val();

            var valid = true;

            if(title === '') {
                $('#title').addClass('is-invalid');
                valid = false;
            } else {
                $('#title').removeClass('is-invalid');
            }

            if(image !== undefined) {
                image_name = image.name;
            }

            if(body === '') {
                $('#body').addClass('is-invalid');
                valid = false;
            } else {
                $('#body').removeClass('is-invalid');
            }

            if(valid) {
                $('#edit').prop('disabled', true);

                $.ajax({
                    url: "{{ config('links.editPost') . $post['pid'] }}",
                    method: 'POST',
                    data: {
                        pid: pid,
                        title: title,
                        image_name: image_name,
                        body: body
                    },
                    success: function (presignedUrl) {
                        if(image === undefined) {
                            window.location = "{{ config('links.gallery') }}";
                            return;
                        }
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