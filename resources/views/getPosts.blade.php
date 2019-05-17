@extends('layouts.app')

@section('content')
    @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 mb-4">
                    <h4 class="float-left"><b>{{ $post['title'] }}</b></h4>
                    <button type="button" class="btn btn-danger btn-sm ml-2 float-right" id="deletePost"
                            onclick="deletePost('{{ $post['pid'] }}', '{{ $post['image_name'] }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                    <a class="btn btn-primary btn-sm ml-2 float-right" href="{{ config('links.editPost') . $post['pid'] }}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </div>
                <div class="col-12 col-lg-8 offset-lg-2 mb-4 text-center">
                    @if ($post['image_name'])
                        <img src="{{ env('CLOUDFRONT_URL') . $post['image_name'] }}"
                             title="{{ $post['title'] }}" data-body="{{ $post['body'] }}" width="100%"
                             onclick="viewImage(this)" style="cursor: pointer; max-width: 500px;">
                    @endif
                </div>
                <div class="col-12 col-lg-8 offset-lg-2 mb-4">
                    <p class="mt-2 mb-2">{{ $post['body'] }}</p>
                    <small>{{ date('d/m/Y H:i', strtotime($post['created_at'])) }}</small>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-12 text-center">
                <h4><b>No Posts</b></h4>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        function viewImage(image) {
            Swal.fire({
                title: $(image).attr('title'),
                text: $(image).attr('data-body'),
                imageUrl: $(image).attr('src'),
                imageWidth: image.naturalWidth,
                width: image.naturalWidth,
                animation: false,
                showCloseButton: true,
                showConfirmButton: false,
            });
        }

        function deletePost(pid, image_name) {
            Swal.fire({
                title: 'Are you sure you want to delete this post?',
                type: 'warning',
                confirmButtonText: 'Delete',
                confirmButtonColor: '#d8534f',
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    $('#deletePost').prop('disabled', true);
                    $.ajax({
                        url: "{{ config('links.deletePost') }}",
                        method: 'POST',
                        data: {
                            pid: pid,
                            image_name: image_name
                        },
                        success: function () {
                            window.location = "{{ config('links.gallery') }}";
                        }
                    });
                }
            });
        }
    </script>
@endsection