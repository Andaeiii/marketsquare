<?php


	class ApiController extends BaseController{


		public function getProducts($item, $amount){
			if(trim(strtolower($item)) == 'products'){
				$p = Product::all()->take($amount);
				pr($p, true);
			}
		}
	}