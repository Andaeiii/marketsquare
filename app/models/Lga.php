<?php


	class Lga extends Basemodel{

		protected $table = 'local_govs';

		public function state(){
			return $this->belongsTo('State', 'state_id');
		}

	}