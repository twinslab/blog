@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>All tags</h2>

            <h4>See all articles with a tag:</h4>

            <ul class="list-unstyled">
                @foreach($tags as $tag)
                    <li><a href="tags/{{ str_replace(' ', '-', $tag->name) }}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
