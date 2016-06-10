<?php

class UserController extends BaseController {

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


	public function messages(){
		return View::make('admin.pages.messages');
	}

	public function reports(){
		return View::make('admin.pages.reports');
	}

	public function stats(){
		return View::make('admin.pages.charts');
	}

	public function editProfile(){
		return View::make('admin.pages.editprofile')
				->with('states', State::all())
				->with('categorys', Category::all());
	}

}
