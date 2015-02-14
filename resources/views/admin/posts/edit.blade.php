@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['admin.posts.update', $post->id], 'method' => 'PUT']) !!}
                @include('admin.posts._form', ['submitText' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
