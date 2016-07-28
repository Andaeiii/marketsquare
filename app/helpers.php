<?php

	//inisitalize sessions....
	
	//define constants... 
	define('DS', DIRECTORY_SEPARATOR); 

	function pr($ar, $bool=false){
		
		echo '<pre>';
		print_r($ar);
		echo '</pre>';
		
		if($bool){
			exit;
		}
		
	}
	

	function shortstr($str, $ct){
	
		$s = substr($str, 0, $ct);
		return $s . '....';
	
	}

	function getThumbnail($imgs, $v){
		$imgs = unserialize($imgs);
		return $imgs[intval($v)];
	}

	function under_score($txt){
		return str_replace(' ','_', $txt);
	}
	

	function mklynks($strr){
		$arr = explode(';', $strr);
		pr($arr, true);
	}
	
?>