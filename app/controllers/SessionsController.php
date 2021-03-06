<?php

class SessionsController extends BaseController {
	public function showLogin(){
		return View::make('admin.page.login');
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
		}
		else {
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password'));
			// attempt to do the login
			if(Auth::attempt($userdata)) {
				return Redirect::to('admin/home');
			}
			else{
				return Redirect::to('login');
			}
		}
	}
	public function doLogout(){
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}
}
