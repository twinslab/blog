<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', isset($post->title)?$post->title:null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', isset($post->slug)?$post->slug:null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content_md', 'Content:') !!}
    {!! Form::textarea('content_md', isset($post->content_md)?$post->content_md:null, ['class' => 'form-control', 'rows' => 15]) !!}
</div>

@unless (empty($tags))
    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}
        <select name="tags[]" id="tags" class="form-control" multiple>
            @foreach ($tags as $id => $name)
                <option {{ !empty($post) && in_array($id, $post->tags->lists('id')) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
@endunless

<input type="submit" value="{!! $submitText !!}" class="btn btn-primary">

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.1/js/select2.min.js"></script>


    <link rel="stylesheet" href="//cdn.jsdelivr.net/editor/0.1.0/editor.css">
    <script src="//cdn.jsdelivr.net/editor/0.1.0/editor.js"></script>
    <script src="//cdn.jsdelivr.net/editor/0.1.0/marked.js"></script>

    <script>
        // select2 tags
        $('#tags').select2();

        // markdown editor
        var editor = new Editor();
            editor.render();
    </script>

@stop
