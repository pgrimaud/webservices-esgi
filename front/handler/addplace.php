<?php
/**
*   Handler: addplace
*
*/
require_once '../lib/core.php';
		
		//get continent
		$post = $_POST;
	
    //set place
		$xml = callWS('http://shareyourworld.rest/place', false, $_POST);
		$insert = new SimpleXMLElement($xml);

		foreach($insert->message as $insert):
			if($insert == 'ok')
				echo '1';
		endforeach;