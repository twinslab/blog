<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller {


	/**
	 * Post instance.
	 *
	 * @var App\Post
     */
	protected $posts;


	/**
	 * The constructor.
	 *
	 * @param App\Post $posts
     */
	public function __construct(Post $posts)
	{
		$this->posts = $posts;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('posts.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('posts.show');
	}

}
