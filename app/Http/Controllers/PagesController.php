<?php namespace App\Http\Controllers;

use App\Post;
use Lang;

class PagesController extends Controller
{
    /**
     * @var \App\Post instance.
     */
    protected $posts;

    /**
     * @param Post $posts
     */
    public function __construct(Post $posts)
	{
        $this->posts = $posts;
		//$this->middleware('guest');
	}

	/**
	 * GET /
	 *
	 * @return Response
	 */
	public function home()
	{
        $posts = $this->posts->latest()->paginate();

		$data = [
			'pageTitle' => Lang::get('pages/home.pageTitle'),
            'posts' => $posts
		];

		return view('pages.home', $data);
	}
}
