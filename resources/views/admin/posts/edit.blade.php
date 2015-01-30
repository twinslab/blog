@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form method="post" action={{ route('admin.posts.update', $post->id) }}>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="{{ $post->title }}" id="title" name="title" class="form-control">
                </div>

                <div class="form-group">
                   <label for="content">Content</label>
                   <textarea id="content" name="content" class="form-control resize-v" rows="15"><?php echo $post->content ?></textarea>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
            </form>
        </div>
    </div>
@endsection
