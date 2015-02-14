@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Create new post</h2>

            {!! Form::open(['route' => 'admin.posts.store']) !!}
                @include('admin.posts._form', ['submitText' => 'Create'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
