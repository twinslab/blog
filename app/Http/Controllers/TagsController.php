<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Tag;
use Lang;

class TagsController extends Controller {
    /**
     * Tag instance.
     *
     * @var \App\Tag
     */
    protected $tags;

    public function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }

    public function index()
    {
        $tags = $this->tags->all();

        $data = [
            'pageTitle' => Lang::get('pages/tags.pageTitle'),
            'tags' => $tags
        ];

        return view('tags.index', $data);
    }

    public function show($tagSlug)
    {
        $tagName = str_replace('-', ' ', $tagSlug);

        $posts = $this->tags->where('name', $tagName)->firstOrFail()->posts()->paginate();

        return view('posts.index', compact('posts'));
    }
}
