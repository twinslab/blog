@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Create new post</h2>
        </div>
        <form method="post" action={{ route('admin.posts.store') }}>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="text" name="name"/>
            <input type="submit" value="Submit"/>
        </form>
    </div>
@endsection
