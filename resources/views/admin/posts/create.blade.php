@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Create new post</h2>

        <form method="post" action={{ route('admin.posts.store') }}>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control resize-v" rows="15"></textarea>
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        </form>

        </div>
    </div>
@endsection
