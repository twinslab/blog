@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>Tags:</h1>

            {!! Form::open() !!}

            <div class="form-group">
                <label for="name">Create new tag: </label>
                <input class="form-control" name="name" id="name" type="text">
            </div>

            <button type="submit" class="btn btn-default" title="Create">Create</button>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @if(! empty($tags))
                <ul id="tags" class="list-unstyled">
                    @foreach($tags as $tag)
                        <li>
                            <span>{{ $tag->name }}</span>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.tags.destroy', $tag->id]]) !!}
                                <button type="submit" class="btn btn-xs btn-danger" title="Delete"
                                onclick="return confirm('Are you sure you want to delete this tag?');">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            {!! Form::close() !!}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Currently, there aren't any tags...</p>
            @endif
        </div>
    </div>
@stop