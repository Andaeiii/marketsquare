<?php

class PagesController extends BaseController {

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

	public function home(){
		return View::make('pages.demo');
	}




	public function showPolicy(){
		//our privacy policy.... 
		echo 'privacy policy....';
	}


	//for admin pages....
	public function admin(){
		//$c = Company::user()->products()->get();
		return View::make('admin.pages.index')
				->with('most_recent', 
					Product::where('company_id', Auth::user()->id)->orderBy('id', 'DESC')->take(4)->get());
				//->with('categories', '');
	}


}
