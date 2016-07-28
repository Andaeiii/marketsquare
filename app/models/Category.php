<?php

	class Category extends Basemodel{

		protected $table = 'categorys';

		public $timestamps = false;		//disable timestamps....

		public static $rules = array(
			'cat_name' => 'required',
			'cat_desc' => 'required'
		);

		public function products(){
			return $this->hasMany('Product', 'category_id');
		}

		public function company(){
			return $this->hasMany('Company', 'category_id');
		}

	}