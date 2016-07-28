<?php

class CartController extends BaseController {

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


	function __construct(){
		$data = Session::all();
		//pr($data);
	}

	public function addItemsToCart(){
		//prepare items for cart... 
		$item_arr = array(
			'item_id' => Input::get('prod_id'),
			'item_ct' => Input::get('item_ct'),
			'qprice' => Input::get('calcprice')
		);
		
	
		//push item into array...
		array_push($_SESSION['shopn_cart'], $item_arr);

		//pr($_SESSION, true);

		//pr(Session::get('shopn_cart'), true);


		//Session::put('shopn_cart', $)

		//redirect back to page.... 
		return Redirect::back();
	}


	public function delItem($v){
		//pr($_SESSION['shopn_cart'], true);
		array_splice($_SESSION['shopn_cart'], $v, 1);
		return Redirect::back();
	}



}
