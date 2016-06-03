<?php

class ItemsController extends BaseController {

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

	public function newItem(){
		return View::make('admin.pages.additem');
	}

	public function allItems(){
		return 'all items';
	}

	public function newCategory(){
		//return new category...
		return 'new categories';
	}

	public function allCategory(){
		return 'all cagtegories... ';
	}



}
