@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Create new post</h2>

            {!! Form::open(['route' => 'admin.posts.store']) !!}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="15"></textarea>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
            {!! Form::close() !!}
        </div>
    </div>
@endsection
