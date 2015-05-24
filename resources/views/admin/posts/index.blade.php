@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>All posts</h1>

            <a href="{!! route('admin.posts.create') !!}" class="btn btn-default">New</a>
            <a href="{!! route('posts.trash.index') !!}" class="btn btn-default">Trash</a>

            @if($posts->isEmpty())
                <p>There no posts. Y u no blogging?</p>
            @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{!! $post->created_at->diffForHumans() !!}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="{!! route('admin.posts.edit', $post->id) !!}" class="btn btn-xs btn-default" title="Edit">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </a>
                                        </li>
                                        <li>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post->id]]) !!}
                                            <button type="submit" class="btn btn-xs btn-danger" title="Move to Trash"
                                            onclick="return confirm('Are you sure you want to delete this post?');">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $posts->render() !!}
            @endif
        </div>
    </div>
@endsection
