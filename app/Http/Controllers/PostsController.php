<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Tag;
use Lang;

class PostsController extends Controller
{
	/**
	 * Post instance.
	 *
	 * @var \App\Post
     */
	protected $posts;

    /**
     * @var Tag
     */
    private $tags;

    /**
     * The constructor.
     *
     * @param \App\Post $posts
     * @param Tag $tags
     */
	public function __construct(Post $posts, Tag $tags)
	{
		$this->posts = $posts;
        $this->tags = $tags;
    }

	/**
     * GET /posts
     *
	 * Display a listing of all posts.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
        $posts = $this->posts->latest()->paginate();
        $tags = $this->tags->all();

        $data = [
            'pageTitle' => Lang::get('pages/posts.pageTitle'),
            'posts' => $posts,
            'tags' => $tags
        ];

		return view('posts.index', $data);
	}

	/**
	 * Display the specified post.
	 *
	 * @param string $slug
	 * @return \Illuminate\View\View
	 */
	public function show($slug)
	{
        $post = $this->posts->where('slug', $slug)->firstOrFail();

		return view('posts.show', compact('post'));
	}
}
