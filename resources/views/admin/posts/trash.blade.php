@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Trash</h2>

             @if($posts->isEmpty())
                <p>Nothing here.</p>
            @else

                {!! Form::open(['method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-xs btn-danger">Empty Trash</button>
                {!! Form::close() !!}

                <table class="table table-hover">
                    <thead>
                        <tr><th>Action</th><th>Title</th><th>Created</th></tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.trash.remove', $post->id]]) !!}
                                            <button type="submit" class="btn btn-xs
                                             btn-danger form-button" title="Remove permanently"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        {!! Form::close() !!}
                                        {!! Form::open(['method' => 'PUT', 'route' => ['posts.trash.restore', $post->id]]) !!}
                                            <button type="submit" class="btn btn-xs
                                             btn-default form-button" title="Restore"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                                        {!! Form::close() !!}
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
