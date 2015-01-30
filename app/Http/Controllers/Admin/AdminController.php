<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * The constructor/
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * GET /admin
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.index');
    }
}
