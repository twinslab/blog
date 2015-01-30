<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller {

	/**
	 * GET /admin/posts
	 * Display a listing of all posts.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
        $posts = Post::paginate(15);

        return view('admin.posts.index', compact('posts'));
	}

	/**
	 * GET /admin/posts/create
	 * Show the form for creating a new post.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.posts.create');
	}

	/**
	 * POST /admin/posts
	 * Store a newly created post in database.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\View\View
	 */
	public function store(Request $request)
	{
		Post::create($request->all());

		return redirect()->route('admin.posts.index');
	}

	/**
	 * GET /admin/posts/{id}/edit
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
        $post = Post::findOrFail($id);

		return view('admin.posts.edit', compact('post'));
	}

	/**
	 * PUT /admin/posts/{id}
	 * Update the specified post in database.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function update(Request $request, $id)
	{
        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('admin.posts.index');
	}

	/**
	 * DELETE /admin/posts/{id}
	 * Remove the specified post from database.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function destroy($id)
	{
        Post::destroy($id);

        return redirect()->route('admin.posts.index');
	}

    /**
     * GET /admin/posts/trash
     * Show trashed posts.
     *
     * @return \Illuminate\View\View
     */
    public function showTrash()
    {
        $posts = Post::onlyTrashed()->paginate(15);

        return view('admin.posts.trash', compact('posts'));
    }

    /**
     * DELETE /admin/posts/trash
     * Hard delete all soft-deleted posts.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function emptyTrash()
    {
        $posts = Post::onlyTrashed()->get();

        foreach ($posts as $post) {
            $post->forceDelete();
        }

        return redirect()->route('posts.trash.index');
    }

    /**
     * PUT /admin/posts/trash/{id}
     * Restore soft-deleted post.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTrashed($id)
    {
        Post::onlyTrashed()->find($id)->restore();

        return redirect()->route('posts.trash.index');
    }

    /**
     * DELETE /admin/posts/trash/{id}
     * Hard delete a soft-deleted post.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeTrashed($id)
    {
        Post::onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('posts.trash.index');
    }
}
