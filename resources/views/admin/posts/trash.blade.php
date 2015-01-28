@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Trash</h2>
            <p><a href="">Empty Trash</a></p>
             @if($posts->isEmpty())
                <p>Nothing here.</p>
            @else
                <table class="table table-hover">
                    <tr><th>Action</th><th>Title</th><th>Created</th></tr>
                    @foreach($posts as $post)
                            <tr>
                                <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post->id]]) ?>
                                        <button type="submit" href="{{ route('admin.posts.destroy', $post->id) }}" class="btn btn-xs
                                         btn-danger form-button" title="Remove permanently"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <?php echo Form::close() ?>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post->id]]) ?>
                                        <button type="submit" href="{{ route('admin.posts.destroy', $post->id) }}" class="btn btn-xs
                                         btn-default form-button" title="Restore"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
                                    <?php echo Form::close() ?>
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                            </tr>
                    @endforeach
                </table>

                <?php echo $posts->render() ?>
            @endif
        </div>
    </div>
@endsection
