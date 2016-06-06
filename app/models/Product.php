<?php


	class Product extends Basemodel{

		protected $table = 'products';

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

	}