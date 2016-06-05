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
		return View::make('admin.pages.additem')
				->with('cats', Category::all());
	}

	public function allItems(){
		return 'all items';
	}

	public function createItem(){



		//if Validation passes..... 
		$v = Product::validate(Input::all());

		if($v->fails()){

			return Redirect::back()->withErrors($v)->withInput();

		}else{
			
				//upload the files to the database.... 
				$count = 1;		
				$files = Input::file('files');
				$upl = array();

				pr($files, true);

			    foreach($files as $fl) {
			    	if(!is_null($fl)){
			    		$ext = $fl->guessClientExtension();
						//give it a new name... and do upload... 
				    	$xname = str_replace('','_',Auth::user()->username).'_'.time().'_'.$count.'.'.$ext;
				        $fl->move('uploads/', $xname);
				        
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
		   		$str = htmlspecialchars(Input::get('prod_desc'));	//text from the editor... 

		   		echo 'the string ' . $str;


		   		exit;

			   //now enter data into dbase... 
			    $id = Product::create(array(

			    	  ));

			 
			try{  // echo $txar;

			}catch(Exception $e){
				echo $e->message();
			}

		 
		}
	}

	private function updateImgDimensions($imgfile){
		 //get file string...
		 $img = 'uploads/'.$imgfile;

		 //create a new image canvas with white background...
		 $bg = Image::canvas(800, 600, '#FFFFFF');

		 //after moving the files...  // resize it... 
		 $wd = Image::make($img)->width();
		 $ht = Image::make($img)->height();


		 //resize it to 800 x 600..... and retain aspect ratio...
		 $resized = Image::make($img)->resize(800, 600, function ($c) {
					    $c->aspectRatio();
					    $c->upsize();
					});

		 //add water mark before adding backgroung... 
		 $watermark = Image::make('assets/watermark.png');
		 $resized->insert($watermark, 'bottom-right', 20, 20);

		 // insert resized image centered into background
		 $bg->insert($resized, 'center');

		 // save back to file
		 if($bg->save($img)){
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
