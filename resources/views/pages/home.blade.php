@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h1>Recent Posts</h1>

            @foreach($posts as $post)
                <div class="post">
                    <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                    <h5>{{ $post->created_at->diffForHumans() }}</h5>
                </div>
            @endforeach

            <hr>
            <a href="{{ route('posts.index') }}">See all</a>

		</div>
	</div>
@endsection
