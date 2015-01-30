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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('posts.index');
	}

    /**
     * Display the specified resource.
     *
     * @param CommonMarkConverter $converter
     * @param  int $id
     * @return \Illuminate\View\View
     */
	public function show(CommonMarkConverter $converter, $id)
	{
        $post = $this->posts->findOrFail($id);

        $post->content = $converter->convertToHtml($post->content);

		return view('posts.show', compact('post'));
	}
}
