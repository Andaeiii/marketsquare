<?php

	class Basemodel extends Eloquent{
	
		public static function validate($data){			//validate data based on rules from ref-model...
			return Validator::make($data, static::$rules);
		}
	
	}