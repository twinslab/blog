<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Tag;
use App\Post;
use App\Http\Controllers\Controller;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
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
     * Tags instance
     *
     * @var \App\Tag
     */
    protected $tags;

    /**
     * The constructor.
     *
     * @param \App\Post $posts
     * @param \App\Tag $tags
     */
    public function __construct(Post $posts, Tag $tags)
    {
        $this->posts = $posts;
        $this->tags = $tags;
    }

    /**
	 * GET /admin/posts
	 * Display a listing of all posts.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
        $posts = $this->posts->orderBy('created_at', 'desc')->paginate(15);

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
        // returns an array with tags like this: [id => name, ...]
        $tags = $this->tags->lists('name', 'id');

		return view('admin.posts.create', compact('tags'));
	}

    /**
     * POST /admin/posts
     * Store a newly created post in database.
     *
     * @param \App\Http\Requests\StoreBlogPostRequest $request
     * @param \League\CommonMark\CommonMarkConverter $converter
     * @return \Illuminate\View\View
     */
	public function store(StoreBlogPostRequest $request, CommonMarkConverter $converter)
	{
        $input = $request->all();

        // Convert markdown to html
        $dirtyHtml = $converter->convertToHtml($input['content_md']);

        // Purify html
        $config = HTMLPurifier_Config::createDefault();

        // Escape instead of deleting
        $config->set('Core.EscapeInvalidTags', true);

        // Allow iframes from trusted sources
        $config->set('HTML.SafeIframe', true);
        // Allow YouTube and Vimeo
        $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%');

        $purifier = new HTMLPurifier($config);
        $purifiedHtml = $purifier->purify($dirtyHtml);

        // Insert purified HTML in the input array
        $input['content_html'] = $purifiedHtml;

        $post = $this->posts->create($input);

        // Attach any tags if they exist
        if (isset($input['tags'])) {
            $post->tags()->attach($input['tags']);
        }

        flash()->success('Post successfully created!');

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
        // returns an array with tags like this [id => name]
        $tags = $this->tags->lists('name', 'id');

        $post = $this->posts->findOrFail($id);

		return view('admin.posts.edit', compact('post', 'tags'));
	}

    /**
     * PUT /admin/posts/{id}
     * Update the specified post in database.
     *
     * @param \App\Http\Requests\UpdateBlogPostRequest $request
     * @param \League\CommonMark\CommonMarkConverter $converter
     * @param  int $id
     * @return \Illuminate\View\View
     */
	public function update(UpdateBlogPostRequest $request, CommonMarkConverter $converter, $id)
	{
        $post = $this->posts->find($id);

        // Convert markdown to html
        $dirtyHtml = $converter->convertToHtml($request->get('content_md'));

        // Purify html
        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.EscapeInvalidTags', true); // escape instead deleting

        // Allow iframes from trusted sources
        $config->set('HTML.SafeIframe', true);

        // Allow YouTube and Vimeo
        $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%');

        $purifier = new HTMLPurifier($config);
        $purifiedHtml = $purifier->purify($dirtyHtml);

        $post->content_html = $purifiedHtml;

        $post->update($request->all());

        if(isset($input['tags'])) {
            // Sync makes sure that there are no duplicate entries for a post-tag pair in the pivot table
            $post->tags()->sync($request->input('tags'));
        }

        flash()->success('The post was successfully updated!');

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
        $this->posts->destroy($id);

        flash()->info('The post was successfully moved to Trash.');

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
        $posts = $this->posts->onlyTrashed()->paginate(15);

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
        $posts = $this->posts->onlyTrashed()->get();

        foreach ($posts as $post) {
            $post->forceDelete();
        }

        flash()->info('Trash is now empty.');

        return redirect()->route('posts.trash.index');
    }

    /**
     * PUT /admin/posts/trash/{id}
     * Restore soft-deleted post.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTrashed($id)
    {
        $this->posts->onlyTrashed()->find($id)->restore();

        flash()->info('All trashed posts were successfully restored.');

        return redirect()->route('posts.trash.index');
    }

    /**
     * DELETE /admin/posts/trash/{id}
     * Hard delete a soft-deleted post.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeTrashed($id)
    {
        $this->posts->onlyTrashed()->find($id)->forceDelete();

        flash()->info('The post was permanently deleted.');

        return redirect()->route('posts.trash.index');
    }
}
