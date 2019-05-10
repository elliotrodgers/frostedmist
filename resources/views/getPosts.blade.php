@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="post-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner text-center">
                    @foreach ($posts as $post)
                        <div class="item {{$loop->first ? 'active' : ''}}">
                            @if ($post['show_image'])
                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}">
                            @endif
                            <h3><b>{{ $post['title'] }}</b></h3>
                            <p class="lead">{{ $post['body'] }}</p>
                        </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#post-carousel" data-slide="prev" style="background-image: none;">
                    <span class="glyphicon glyphicon-chevron-left text-primary"></span>
                </a>
                <a class="right carousel-control" href="#post-carousel" data-slide="next" style="background-image: none;">
                    <span class="glyphicon glyphicon-chevron-right text-primary"></span>
                </a>
            </div>
        </div>
    </div>

{{--    {{ date('d/m/Y h:i', strtotime($post['date_created'])) }}--}}
@endsection
