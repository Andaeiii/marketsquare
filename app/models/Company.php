<?php

	/*
	    [_token] => WsBMLjITLoLixYWmZBSE1h6Rm6JXCbHHlck1Ltzu
	    [fullname] => Shell Nigeria Limited
	    [email] => shellnigeria@gmail.com
	    [address] => 23, Gnassingbe Street oyadiran Wuse2
	    [stat_optn] => 236
	    [username] => shelladmin
	    [password] => shellpass
	    [rpassword] => shellpass
	    [hearaboutus] => i heard about you from the newspaper... 
	    [tnc] => on
	*/
	class Company extends Basemodel{

		protected $table = 'companys';

		public static $messages = array(
			'fullname' 			=>	'must be more than 5 characters',
			'email'				=>	'required and a minimum of ',
			'address'			=>	'required',
		);

		//the rules... 
		public static $rules = array(
			'fullname' 			=>	'required|min:5',
			'email'				=>	'required|email',
			'phone'				=>	'required|min:8',
			'address'			=>	'required',
			'state_optn'		=>	'required',
			'lga_optn'			=>	'required',
			'username'			=>	'required|unique:users,username|min:6',
			'password'			=>	'required|min:8',
			'confirm_password'	=>	'same:password',
			'hearaboutus'		=>	'required'
		);

		//every company belongs to a user...
		public function user(){
			return $this->belongsTo('User', 'user_id');
		}


	}