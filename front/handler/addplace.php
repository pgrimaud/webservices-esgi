<?php
/**
*   Handler: addplace
*
*/
require_once '../lib/core.php';
		
		//get continent
		$post = $_POST;
	
    //set place
		$xml = callWS('http://shareyourworld.rest/towns?country_id='.$id);
		$towns = new SimpleXMLElement($xml);
		
		foreach($towns->town as $town)
			$data['towns'][] = array('id' => (string)$town->id[0], 'name' => (string)$town->name[0]);		
    // OUTPUT
    loadResource('view', 'towns', $data);