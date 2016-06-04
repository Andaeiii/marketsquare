<?php

	class Category extends Basemodel{

		protected $table = 'categorys';

		public $timestamps = false;		//disable timestamps....

		public static $rules = array(
			'cat_name' => 'required',
			'cat_desc' => 'required'
		);

	}