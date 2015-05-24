@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>

            {!! Form::open(['class' => 'form-inline']) !!}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" id="name" type="text">
                </div>

                <button type="submit" class="btn btn-default" title="Create">Create</button>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            @if($tags->isEmpty())
                There no tags.
            @else
                <table id="tags" class="table table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.tags.destroy', $tag->id]]) !!}
                                        <button type="submit" class="btn btn-xs btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this tag?');">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div><!-- END .col-md-6 -->
    </div><!-- END .row -->
@endsection
