@extends('layouts.app')

@if ($posts->isEmpty())
    @section('title', 'No Posts')
@endif

@section('content')
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 mb-4">
                <h4 class="float-left"><b>{{ $post['title'] }}</b></h4>
                @if (session('logged_in'))
                    <button type="button" class="btn btn-danger btn-sm ml-2 float-right" id="deletePost"
                            onclick="deletePost(this, '{{ $post['pid'] }}', '{{ json_encode($post['image_names'], true) }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                    <a class="btn btn-primary btn-sm ml-2 float-right"
                       href="{{ config('links.editPost') . $post['pid'] }}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                @endif
            </div>
            @if ($post['image_names'])
                @foreach ($post['image_names'] as $image_name)
                    <div class="col-12 col-lg-8 offset-lg-2 mb-4 text-center">
                        <a data-fancybox="gallery" href="{{ config('links.cloudFront') . $image_name }}">
                            <img src="{{ config('links.cloudFront') . $image_name }}"
                                 title="{{ $post['title'] }}" data-body="{{ $post['body'] }}" width="100%"
                                 style="cursor: pointer; max-width: 500px;">
                        </a>
                    </div>
                @endforeach
            @endif
            <div class="col-12 col-lg-8 offset-lg-2 mb-4">
                <p class="mt-2 mb-2" style="white-space: pre-wrap;">{{ $post['body'] }}</p>
                <small>{{ date('d/m/Y H:i', strtotime($post['created_at'])) }}</small>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        function deletePost(button, pid, image_names) {
            Swal.fire({
                title: 'Are you sure you want to delete this post?',
                type: 'warning',
                confirmButtonText: 'Delete',
                confirmButtonColor: '#d8534f',
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    $(button).prop('disabled', true);
                    $.ajax({
                        url: "{{ config('links.deletePost') }}",
                        method: 'POST',
                        data: {
                            pid: pid,
                            image_names: image_names
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