<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Basemodel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	//make code.... 
	public static function getRandomCode(){
		$rv = self::where('assigned', false)->get();
		$v = rand(1, count($rv)); //echo $v;
		return $rv[$v-1];
	}

	public function entity(){
		if($this->type == 'client'){
			return $this->hasOne('Company', 'user_id');
		}else{

		}
	}

}
