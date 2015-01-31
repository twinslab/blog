@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Trash</h2>

             @if($posts->isEmpty())
                <p>Nothing here.</p>
            @else

                {!! Form::open(['method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-xs btn-danger"
                    onclick="return confirm('Are you sure you want to permanently delete all posts?');">Empty Trash</button>
                {!! Form::close() !!}

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
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            {!! Form::open(['method' => 'PUT', 'route' => ['posts.trash.restore', $post->id]]) !!}
                                            <button type="submit" class="btn btn-xs btn-default" title="Restore">
                                                <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                                            </button>
                                            {!! Form::close() !!}
                                        </li>
                                        <li>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.trash.remove', $post->id]]) !!}
                                                <button type="submit" class="btn btn-xs btn-danger" title="Remove permanently"
                                                onclick="return confirm('Are you sure you want to permanently delete this post?');">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
