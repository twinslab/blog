@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>All Posts</h1>

            @foreach($posts as $post)
                <div class="post">
                    <h3><a href="{!! route('posts.show', $post->slug) !!}">{{ $post->title }}</a></h3>
                    <p class="text-muted">{!! $post->created_at->diffForHumans() !!}</p>
                </div>
            @endforeach

            {!! $posts->render() !!}
        </div>
    </div>
@endsection
