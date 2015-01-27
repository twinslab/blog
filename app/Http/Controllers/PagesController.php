<?php namespace App\Http\Controllers;

use Lang;

class PagesController extends Controller {

	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * GET /
	 *
	 * @return Response
	 */
	public function home()
	{
		$data = [
			'pageTitle' => Lang::get('pages/home.pageTitle')
		];

		return view('pages.home', $data);
	}

}
