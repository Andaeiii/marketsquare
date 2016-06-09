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

	function __construct(){
		
	}

	public function newItem(){
		return View::make('admin.pages.additem')
				->with('cats', Category::all());
	}

	public function allItems(){
		return View::make('admin.pages.allitems')
				->with('allitems', Product::all())
				->with('curitem', 'datatablex');
	}

	public function deleteItem($v){
		echo $v;
	}

	public function createItem(){
		//echo Auth::user()->id; 

		//pr(Input::all(), true);

		//if Validation passes..... 
		$v = Product::validate(Input::all());

		if($v->fails()){

			return Redirect::back()->withErrors($v)->withInput();

		}else{
			
				//upload the files to the database.... 
				$count = 1;		
				$upl = array();

				//get the files first... 
				$files = Input::file('files');

				//pr($files, true);

			    foreach($files as $fl) {
			    	if(!is_null($fl)){
			    		$ext = $fl->guessClientExtension();
						//give it a new name... and do upload... 
				    	$xname = str_replace('','_',Auth::user()->username).'_'.time().'_'.$count.'.'.$ext;
				        $fl->move('uploads/large/', $xname);
				        
				        //increase counter and push into array...
				        array_push($upl, $xname);	

				       	//resize image and move on... 
				       	$this->updateImgDimensions($xname);

				       	//increase the counter... 
				        $count++;		        
			    	}		    	
			    }
				
				//prepare images for dbase.... 
			    $txar = serialize($upl);		

			    //prepare cheditor for dbase....  
		   		$strr = htmlspecialchars(Input::get('prod_desc'));	//text from the editor... 

		   		//echo 'the string ' . $str;


		   		//exit;
		   		/*
					id, company_id, category_id, name, short_description, description, quoted_price, 
					selling_price, images, created_at, updated_at
		   		*/
			   //now enter data into dbase... 

			  try{  // echo $txar;

			    $id = Product::create(array(
			    			'company_id' 		=> Auth::user()->id, //Input::get(''),
			    			'category_id' 		=> Input::get('prod_cat'),
			    			'name'				=> Input::get('prod_name'),
			    			'short_description'	=> stripslashes(Input::get('short_desc')),
			    			'stock_count' 		=> Input::get('prod_count'),
			    			'quoted_price'		=> Input::get('qprice'),
			    			'selling_price'		=> Input::get('sprice'),
			    			'images'			=> $txar,
			    			'description'		=> $strr,
			    	  ));


			    if($id){

			    	return Redirect::back()->with('message', 'product added successfully....');
			    }

			 
			

			}catch(Exception $e){
				echo $e->message();
			}

		 
		}
	}

	private function updateImgDimensions($imgfile){
		 //get file string...
		 $img = 'uploads/large/'.$imgfile;
		 $thmb = 'uploads/small/'.$imgfile;

		 //create a new image canvas with white background...
		 $bg = Image::canvas(800, 600, '#FFFFFF'); //for larve canvas... 
		 $thbg = Image::canvas(160, 120, '#FFFFFF'); //for small canvas..

		 //after moving the files...  // resize it... 
		 //$wd = Image::make($img)->width();
		 //$ht = Image::make($img)->height();


		 //resize it to 800 x 600..... and retain aspect ratio...
		 $resized = Image::make($img)->resize(800, 600, function ($c) {
					    $c->aspectRatio();
					    $c->upsize();
					});

		 //add water mark to LARGE image before adding backgroung... 
		 $watermark = Image::make('assets/watermark.png');
		 $resized->insert($watermark, 'bottom-right', 20, 20);

		 // insert resized image centered into background
		 $bg->insert($resized, 'center');



		 //resize a smaller version too..... no watermarks... 
		 $small = Image::make($img)->resize(160, 120, function ($c) {
					    $c->aspectRatio();
					    $c->upsize();
					});

		 $thbg->insert($small, 'center');	// insert small image on white background too...

		 // save back to file
		 if($bg->save($img) && $thbg->save($thmb)){
		 	echo 'resized....';
		 }

		 /*
			 echo 'image :: ' . $imgfile;
			 if($wd == $ht || $ht > $wd){
			 	//echo ' ('.$wd .' x '. $ht.') - dimensions are the same...';
			 }elseif($wd > $ht){
			 	echo ' ('.$wd .' x '. $ht.') - width is greater <br/>';
			 }
			 echo '<br/>';
		 */
	}


	//handle categories here.... 

	public function newCategory(){
		//return new category...
		return View::make('admin.pages.categorys')
				->with('cats', Category::all());;
	}

	public function getCategorys($id){
		//$p = Category::find($ct)->get(); pr($p);		
		$p = DB::table('categorys')->where('id', $id)->pluck('description');
		echo '<strong>Examples Include </strong> <br/>'.str_replace(',','<br/>', strval($p));
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
