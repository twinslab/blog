<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! route('home') !!}">Blog</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{!! route('posts.index') !!}">Posts</a></li>
                <li><a href="{!! route('tags.index')  !!}">Tags</a></li>

                <!-- <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form> -->

                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{!! route('admin.posts.index') !!}">Posts</a></li>
                            <li><a href="{!! route('admin.tags.index')  !!}">Tags</a></li>
                            <li class="divider"></li>
                            <li><a href="{!! action('Auth\AuthController@getLogout') !!}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- END .navbar-collapse -->
    </div><!-- END .container -->
</nav>
