@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>All posts</h2>

            @if($posts->isEmpty())
                <p>{{ "There aren't any posts" }}</p>
            @else
                <table class="table table-hover col-md-10">
                    <tr><th>Title</th><th>Created</th></tr>
                    @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                            </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
