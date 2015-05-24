@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1>{{ $post->title }}</h1>

            <article>
                {!! $post->content_html !!}
            </article>

            <div id="disqus_thread"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = '';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@endsection
