@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Edit post</h2>
            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection
