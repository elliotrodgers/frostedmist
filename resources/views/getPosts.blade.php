@extends('layouts.app')

@section('content')

    @foreach ($posts as $post)
        <div class="row mb-4">
            <div class="col-md-8 offset-md-2 col-xl-4 offset-xl-4">
{{--                <div class="card">--}}
{{--                    <img class="card-img-top" src="{{ $post['image'] }}" alt="{{ $post['title'] }}">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title"><b>{{ $post['title'] }}</b></h5>--}}
{{--                        <p class="card-text">{{ $post['body'] }}</p>--}}
{{--                        <p class="card-text"><small class="text-muted">{{ date('d/m/Y h:i', strtotime($post['date_created'])) }}</small></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <h4><b>{{ $post['title'] }}</b></h4>
                <img class="card-img-top" src="{{ $post['image'] }}" alt="{{ $post['title'] }}">
                <p class="card-text">{{ $post['body'] }}</p>
                <small>{{ date('d/m/Y h:i', strtotime($post['date_created'])) }}</small>
            </div>
        </div>
    @endforeach

{{--    <div class="row">--}}
{{--        <div class="col-md-8 offset-2">--}}
{{--            <div id="post-carousel" class="carousel slide" data-ride="carousel" data-interval="false">--}}
{{--                <div class="carousel-inner text-center">--}}
{{--                    @foreach ($posts as $post)--}}
{{--                        <div class="item {{$loop->first ? 'active' : ''}}">--}}
{{--                            @if ($post['show_image'])--}}
{{--                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}">--}}
{{--                            @endif--}}
{{--                            <h3><b>{{ $post['title'] }}</b></h3>--}}
{{--                            <p class="lead">{{ $post['body'] }}</p>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <a class="left carousel-control" href="#post-carousel" data-slide="prev" style="background-image: none;">--}}
{{--                    <span class="glyphicon glyphicon-chevron-left text-primary"></span>--}}
{{--                </a>--}}
{{--                <a class="right carousel-control" href="#post-carousel" data-slide="next" style="background-image: none;">--}}
{{--                    <span class="glyphicon glyphicon-chevron-right text-primary"></span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    {{ date('d/m/Y h:i', strtotime($post['date_created'])) }}--}}
@endsection
