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
            <div id="image-previews">
                @if ($post['image_names'])
                    @foreach($post['image_names'] as $image_name)
                        <img class="mb-3" id="image-preview" src="{{ config('links.cloudFront') . $image_name }}" width="100%">
                    @endforeach
                @endif
            </div>
            <input type="file" name="image" id="image" accept="image/*" onchange="showImagePreviews(this.files)" width="100%" multiple>
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
@endsection

@section('scripts')
    <script>

        function showImagePreviews(images) {

            var image_previews = '';
            for (var i = 0; i < images.length; i++) {
                image_previews += '<img class="mb-3" id="image-preview" src="' + window.URL.createObjectURL(images[i]) + '" width="100%">'
            }
            $("#image-previews").empty().append(image_previews);
        }

        function edit() {

            var pid = $('#pid').val();
            var title = $('#title').val();
            var images = $('#image').prop('files');
            var image_names = [];
            var body = $('#body').val();

            var valid = true;

            if(title === '') {
                $('#title').addClass('is-invalid');
                valid = false;
            } else {
                $('#title').removeClass('is-invalid');
            }

            if(images !== undefined) {
                for (var i = 0; i < images.length; i++) {
                    image_names.push(images[i].name);
                }
            } else {
                image_names = [];
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
                        image_names: image_names,
                        body: body
                    },
                    success: function (presignedUrls) {
                        if(presignedUrls.length > 0) {
                            for (var i = 0; i < presignedUrls.length; i++) {
                                $.ajax({
                                    url: presignedUrls[i],
                                    type: 'PUT',
                                    data: images[i],
                                    contentType: images[i].type,
                                    processData: false,
                                })
                            }
                            $(document).ajaxStop(function () {
                                window.location = "{{ config('links.gallery') }}";
                            });
                        } else {
                            window.location = "{{ config('links.gallery') }}";
                        }
                    }
                });
            }
        }
    </script>
@endsection
