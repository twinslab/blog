@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>All posts</h2>
            <a href="{!! route('posts.trash.index') !!}">Trash</a>

            @if($posts->isEmpty())
                <p>There no posts. Y u no blogging?</p>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr><th>Action</th><th>Title</th><th>Created</th></tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post->id]]) !!}
                                    <button type="submit" href="{{ route('admin.posts.destroy', $post->id) }}" class="btn btn-xs
                                     btn-danger form-button" title="Move to Trash"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                {!! Form::close() !!}
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-xs btn-default" title="Edit">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                {!! $posts->render() !!}
            @endif
        </div>
    </div>
@endsection
