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


	//handle categories here.... 

	public function newCategory(){
		//return new category...
		return View::make('admin.pages.categorys')
				->with('cats', Category::all());;
	}

	public function addCategory(){		
		$v = Category::validate(Input::all());
		if($v->fails()){
			return Redirect::back()->withErrors($v)->withInput();
		}else{
			//pr(Input::all());
			$c = new Category;
			$c->name = trim(Input::get('cat_name'));
			$c->description = trim(Input::get('cat_desc'));
			$c->tags = trim(Input::get('cat_tags'));
			if($c->save()){
				//return to page... 
				return Redirect::to('client/category/new')
					->with('msg', 'Category successfully added..');
					
			}
		}
	}

	public function delCategory($id){
		Category::find($id)->delete();//return to page... 
		return Redirect::to('client/category/new');
	}

	//



}
