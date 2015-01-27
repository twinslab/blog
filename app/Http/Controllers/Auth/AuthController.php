<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
s	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

		$this->middleware('guest', ['except' => 'getLogout']);
	}


	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		$data = [
			'pageTitle' => 'Login'
		];

		return view('auth.login', $data);
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended('/');
		}

		return redirect('/auth/login')
			->withInput($request->only('email'))
			->withErrors([
				'email' => 'These credentials do not match our records.',
			]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}
