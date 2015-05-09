@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>{{ $post->title }}</h1>

            <article>
                {!! $post->content_html !!}
            </article>
        </div>
    </div>
@endsection
