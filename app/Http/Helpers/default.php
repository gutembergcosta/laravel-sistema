<?php


	function teste(){

		return 'teste';
	}

	function x($variavel,$default = NULL){

		return (isset($variavel)) ?: $default;

	}

	function isMobile() {
		
		if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$is_mobile = false;
		} elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // Many mobile devices (all iPhone, iPad, etc.)
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
				$is_mobile = true;
		} else {
			$is_mobile = false;
		}
	
		return $is_mobile;
	}

	function slug($str){


		if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') ){
			$str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
		}
				
		$str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
		$str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\\1', $str);
		$str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
		$str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
		$str = strtolower( trim($str, '-') );
		$str = substr($str, 0, 100);
		return $str;

	}

	function numeros($str){

		return preg_replace('/[^0-9]/', '', $str);  

	}

	function moeda($moeda, $destino = 'site'){

		if($moeda == '') return 0;

		if($destino == 'db'){
			$moeda = str_replace(".", "", $moeda);
			$moeda = str_replace("R$ ", "", $moeda);
			$moeda = str_replace(",", ".", $moeda);
		}

		if($destino == 'site'){
			$moeda = number_format($moeda, 2, ',', '.');
		}

		return $moeda;

	}


	function extractYoutubeURL($url){

		parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
		return $my_array_of_vars['v'];   

	}

	function dataSimples($data, $destino){

		if($destino == 'db') return implode('-', array_reverse(explode('/', $data)));

		if($destino == 'site'){

			if(strlen($data) > 10) $data = explode(' ',$data)[0]; 
			return implode('/', array_reverse(explode('-', $data)));

		} 
	}

	


?>