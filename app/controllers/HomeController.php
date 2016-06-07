<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

//	public function showHome()
//	{
//		if(Auth::check()){
//			$apeaje = 'apeaje';
//			return View::make('main.home', array(
//				'imageDesc' => Posts::get(),
//				'userID' => Auth::id(),
//				'apeaje' => $apeaje,
//				'auth' => 'true'
//
//			));
//		}
//		else{
//			return View::make('main.home', array(
//				'imageDesc' => Posts::get(),
//				'auth' => 'false'
//			));
//		}
//	}

	public function showWelcome(){
		return View::make('main.home');
	}

	public function showLogin(){
		// show the form
		return View::make('main.login');
	}

	public function doLogin(){
	// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

	// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

	// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				 return Redirect::to('authenticated');
				// for now we'll just echo success (even though echoing in a controller is bad)
//				echo 'SUCCESS! '.Auth::user()->username;



			} else {

				// validation not successful, send back to form
				return Redirect::to('login');

			}

		}
	}

	public function showAuthenticated(){
		return View::make('main.home_auth')->with(array(
			'user' => Auth::user()->id
		));
	}

	public function showAuthenticated2(){
		return View::make('main.home_auth')->with(array(
			'user' => Auth::user()->id
		));
	}
}
