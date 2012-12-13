<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public $restful = true;

	/*public function __construct(){
		$this->filter('before', 'auth');
	}*/

	public function get_index()
	{
		return View::make('home.index');
	}

	public function get_new(){
		return View::make('home.new');
	}
	
	public function post_new()
	{
		// Get the input fields from the form into an array
		$new_user = array(
	        'username'  => Input::get('username'),
	        'password'  => Input::get('password')
    	);
   
   		// Create the array of validation rules
    	$rules = array(
	        'username'  =>	'required|min:3|max:128|alpha_dash|unique:users',
	        'password'	=>	'required|min:3|max:128'
    	);
    
    	// Make the validator
	    $validation = Validator::make($new_user, $rules);
	    if ( $validation -> fails() )
	    {   
	        return Redirect::back()
	                ->with_errors($validation)
	                ->with_input();
	    }
	    // hash the password
	    $new_user['password'] = Hash::make($new_user['password']);

	    // create new user and redirect to the login page with a success message
	    $user = new User($new_user);
	    $user->save();
	    return Redirect::to_action('home@login')->with('success_message', true);
	}

	public function get_login()
	{
    	return View::make('home.login');
	}

	/**
	 *  post_login processes the login page form and loggs the user in if the credentials match the ones in the database
	 */
	public function post_login()
	{
		
		$remember = Input::get('remember');
 		$credentials = array(
 			'username' => Input::get('username'), 
 			'password' => Input::get('password'),
 			'remember' => !empty($remember) ? $remember : null
 		);
 		
    	if (Auth::attempt( $credentials ))
		{
		 	return Redirect::to_action('home@index');
		}else{
			return Redirect::to_action('home@login')
			->with_input()
			->with('login_errors', true);
        }
	}

	// get_logout logs the user out by clearing the session and redirects to login page with a logout message
	public function get_logout()
	{
		Auth::logout();
		return Redirect::to_action('home@login')->with('logout_message', true);
	}

}