@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['admin.posts.update', $post->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="{{ $post->title }}" id="title" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Slug</label>
                    <input type="text" value="{{ $post->slug }}" id="slug" name="slug" class="form-control">
                </div>

                <div class="form-group">
                   <label for="content">Content</label>
                   <textarea id="content_md" name="content_md" class="form-control" rows="15">{!! $post->content_md !!}</textarea>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
            {!! Form::close() !!}
        </div>
    </div>
@endsection
