<?php namespace CJAN\Http\Controllers\Auth;

use CJAN\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Auth;
use Hash;
use Validator;

use Debugbar;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => ['getLogout', 'getProfile', 'postProfile']]);
		$this->redirectPath = '/';
	}

	public function getProfile()
	{
		$user = Auth::user();
		return view('auth.profile', array('user' => $user));
	}

	/**
	 * Handle a profile update request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postProfile(Request $request)
	{
		// validate mandatory fields
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255'
		]);

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$user = Auth::user();
		$user->name = $request->input('name');
		$user->email = $request->input('email');

		// validate password if provided
		$password = $request->input('password');
		if ($password && strlen(trim($password)) > 0)
		{
			$validator = Validator::make($request->all(), [
				'password' => 'required|confirmed|min:6'
			]);

			if ($validator->fails())
			{
				$this->throwValidationException(
					$request, $validator
				);
			}

			$user->password = Hash::make($password);
		}

		$newToken = $request->input('new_access_token');

		if ($newToken && strlen(trim($newToken)) > 0)
		{
			$user->access_token = str_random(20);
		}

		$user->save();
		
		return redirect('/auth/profile');
	}

}
