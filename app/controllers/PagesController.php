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

	function __construct(){
		//$data = Session::all();
		if(!isset($_SESSION['shopn_cart'])){ //Session::has('shopn_cart')){
			$_SESSION['shopn_cart'] = array(); //initialize the session...
		}
	}



	public function home(){
		$p = Product::all(); //->count();

		return View::make('pages.home')
				->with('allcats', Category::all())
				->with('catgs', $this->listCatgs())
				->with('otherItems', $p);
	}

	public function demo(){
		return View::make('pages.demo');
	}



	public function coyItems($id){
		//echo $id; exit;
		$prods = Product::where('company_id', $id)->get();
		$coyinfo = Company::where('user_id', $id)->first();
		//pr($coy, true);

		return View::make('pages.allitems')
				->with('pgtitle', $coyinfo->name . ' Items')
				->with('allcats', Category::all())
				->with('coyinfo', $coyinfo)
				->with('allitems', $prods);
		//pr($prods);

	}

	public function showFilteredResults($coyid, $nm){

		$q = trim($nm);

		$pcs = Product::where('company_id', $coyid)
						->where('name', 'like', '%'.$nm.'%')
						->orWhere('description', 'like', '%'.$nm.'%')->get();	//get the arrays.... 

		return View::make('pages.allitems')
				->with('pgtitle', 'Category :: '. trim($nm))
				->with('allcats', Category::all())
				->with('allitems', $pcs);

	}

	public function catItems($id){
		//echo $id; exit;
		$prods = Product::where('category_id', $id)->get();
		$catinfo = Category::where('id', $id)->first();
		//pr($catinfo, true);

		return View::make('pages.allitems')
				->with('pgtitle', $catinfo->name)
				->with('catinfo', $catinfo)
				->with('allcats', Category::all())
				->with('allitems', $prods);

	}



	///// the search results.... 


	public function showGridResults(){
		$q = trim(Input::get('q'));

		//create the product array....
		$sarr = array();

		//search by company... 
		$coys = Company::where('name', 'like', '%'.$q.'%')->get();
		foreach($coys as $coy){
			$pcs = Product::where('company_id', $coy->user_id)->get();	//get the arrays.... 
			//check for duplicates......
			foreach($pcs as $val){
			    if(!in_array($val, $sarr, true)){
			        array_push($sarr, $val);
			    }
			}
		}

		
		//search by category...
		$cts = Category::where('name', 'like', '%'.$q.'%')
						->orWhere('description', 'like', '%'.$q.'%')->get();
		foreach($cts as $c){
			$pcs = Product::where('category_id', $c->id)->get();	//get the arrays.... 
			//check for duplicates......
			foreach($pcs as $val){
			    if(!in_array($val, $sarr, true)){
			        array_push($sarr, $val);
			    }
			}
		}



		//search by prod-name...
		$pss = Product::where('name', 'like', '%'.$q.'%')
						->orWhere('description', 'like', '%'.$q.'%')
						->orWhere('short_description', 'like', '%'.$q.'%')->get();

		foreach($pss as $c){
			foreach($pss as $val){
			    if(!in_array($val, $sarr, true)){
			        array_push($sarr, $val);
			    }
			}
		}				


		//pr($sarr, true);

	 $tpx = (empty(trim($q))) ? 'All Available Products' : 'Results for '. $q;

		return View::make('pages.allitems')
				->with('pgtitle', $tpx)
				->with('allcats', Category::all())
				->with('allitems', $sarr);
	}




	private function listCatgs(){		
		$cg = Category::all();
		$s = array();

		foreach($cg as $c){
			$cts = explode(';', $c->description);
			foreach($cts as $ts){
				if(!empty(trim($ts))){
					array_push($s, trim($ts));
				}
			}
		}
		return $s;
	}


	public function myCart(){

		$shArray = array();

		foreach($_SESSION['shopn_cart'] as $shc){
			$prod = array(
				'product' => Product::find($shc['item_id'])->first(array('id','name','short_description','quoted_price')),
				'count'	  => $shc['item_ct'] //get product...
			);
			array_push($shArray, $prod);
		}

		return View::make('pages.cart')
		->with('has_tables', true)
		->with('all_items', $shArray)
		->with('allcats', Category::all());
	}


	public function singleItem($id){
		$p = Product::find($id);
		$coy = Company::where('user_id', $p->company_id)->first();
		return View::make('pages.item')
				->with('coy', $coy)
				->with('item', $p)
				->with('catgs', $this->listCatgs())
				->with('allcats', Category::all())
				->with('otherItems', Product::where('company_id', $p->company_id)->take(4)->get());
	}


	public function showPolicy(){
		//our privacy policy.... 
		echo 'privacy policy....';
	}


	//for admin pages....
	public function admin(){
		//$c = Company::user()->products()->get();
		return View::make('admin.pages.index')
				->with('total_prods', Product::where('company_id', Auth::user()->id)->count())
				->with('most_recent', 
					Product::where('company_id', Auth::user()->id)->orderBy('id', 'DESC')->take(4)->get());
				//->with('categories', '');
	}

	public function useTestShop(){
		return View::make('pages.test')
				->with('categories', Category::all());
	}


}
