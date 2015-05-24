@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Tags</h1>

            <ul class="list-unstyled">
                @foreach($tags as $tag)
                    <li><a href="tags/{!! str_replace(' ', '-', $tag->name) !!}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
