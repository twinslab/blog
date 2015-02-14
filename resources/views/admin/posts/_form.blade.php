<div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="{{ isset($post->title)?$post->title:null }}" name="title" id="title" class="form-control">
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" value="{{ isset($post->slug)?$post->slug:null }}" name="slug" id="slug" class="form-control">
</div>

<div class="form-group">
    <label for="content_md">Content</label>
    <textarea name="content_md" id="content_md" class="form-control" rows="15">{{ isset($post->content_md)?$post->content_md:null }}</textarea>
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <input value="{{ isset($post->tags)?$post->tags:null }}" name="tags" id="tags" class="form-control">
</div>

<input type="submit" value="{!! $submitText !!}" class="btn btn-primary">