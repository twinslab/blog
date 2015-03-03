<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {

    /**
     * Tag instance
     *
     * @var Tag
     */
    protected $tags;


    /**
     * The constructor
     *
     * @param \App\Tag
     */
    function __construct(Tag $tags)
    {
        $this->tags = $tags;
    }

    /**
     * GET /admin/tags
	 * Display a listing of the tags.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tags = $this->tags->all();

		return view('admin.tags.index', compact('tags', $tags));
	}

	/**
     * POST /admin/tags
     *
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->tags->create($request->all());

        return redirect()->route('admin.tags.index');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
     * DELETE /admin/tags/{id}
     *
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->tags->destroy($id);

        return redirect()->route('admin.tags.index');
	}

}
