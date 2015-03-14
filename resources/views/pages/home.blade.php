@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Recent Posts</h1>

            @foreach($posts as $post)
                <div class="post">
                    <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                    <h5>{{ $post->created_at->diffForHumans() }}</h5>
                </div>
            @endforeach

            <?php echo $posts->render(); ?>
		</div>
	</div>
@endsection
