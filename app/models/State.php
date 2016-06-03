<?php


	class State extends Basemodel{

		protected $table = 'states';

		public function lgas(){
			return $this->hasMany('Lga', 'state_id');
		}
		
	}