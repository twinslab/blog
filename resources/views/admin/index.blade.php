@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Admin panel</h2>
            <ul class="list-unstyled">
                <li><a href="{{ route('admin.posts.index') }}">Manage posts</a></li>
                <li><a href="{{ url('auth/logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
@endsection
