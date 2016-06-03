<?php

	function pr($ar, $bool=false){
		
		echo '<pre>';
		print_r($ar);
		echo '</pre>';
		
		if($bool){
			exit;
		}
		
	}
	
	
	
	function resetAll(){
		//echo 'resettng';
	}
	
	
?>