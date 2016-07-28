<?php


	class Product extends Basemodel{

		protected $table = 'products';
		
		//set array of items that are fillable...
		protected $fillable =  array('company_id', 'category_id', 'name', 'short_description', 'description', 'quoted_price', 
					'selling_price','prod_count', 'images');

		public static $rules = array(
			'prod_name' 	=> 'required',
			'prod_desc' 	=> 'required',
			'prod_cat' 		=> 'required',
			'prod_count' 	=> 'required',
			'sprice' 		=> 'required',
			'qprice' 		=> 'required',
			'files'			=> 'required'
		);


		public function user(){
			return $this->belongsTo('User', 'user_id');
		}

		public function category(){
			return $this->belongsTo('Category', 'category_id');
		}

	}