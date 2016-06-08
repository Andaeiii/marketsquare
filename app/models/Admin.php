<?php

	class Admin extends Basemodel{

		
		public static $rules = array(
			'qpass' => 'required|email', //to validate the mails...
		);


	}