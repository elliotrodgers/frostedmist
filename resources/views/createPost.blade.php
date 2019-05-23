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
            <label for="images">Images</label>
            <div id="image-previews"></div>
            <input type="file" name="images" id="images" accept="image/*" onchange="showImagePreviews(this.files)" width="100%" multiple>
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

        function showImagePreviews(images) {

            var image_previews = '';
            for (var i = 0; i < images.length; i++) {
                image_previews += '<img class="mb-3" id="image-preview" src="' + window.URL.createObjectURL(images[i]) + '" width="100%">'
            }
            $("#image-previews").empty().append(image_previews);
        }

        function post() {

            var title = $('#title').val();
            var images = $('#images').prop('files');
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
                $('#post').prop('disabled', true);

                $.ajax({
                    url: "{{ config('links.createPost') }}",
                    method: 'POST',
                    data: {
                        title: title,
                        image_names: image_names,
                        body: body
                    },
                    success: function (presignedUrls) {
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
                    }
                });
            }
        }
    </script>
@endsection