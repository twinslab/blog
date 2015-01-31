<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use League\CommonMark\CommonMarkConverter;

class PostsController extends Controller
{
	/**
	 * Post instance.
	 *
	 * @var \App\Post
     */
	protected $posts;

	/**
	 * The constructor.
	 *
	 * @param \App\Post $posts
     */
	public function __construct(Post $posts)
	{
		$this->posts = $posts;
	}

	/**
	 * Display a listing of all posts.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('posts.index');
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int $id
	 * @return \Illuminate\View\View
	 */
	public function show($id)
	{
        $post = $this->posts->findOrFail($id);

		return view('posts.show', compact('post'));
	}
}
