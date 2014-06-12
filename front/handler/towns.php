<?php
/**
*   Handler: towns
*
*/
require_once '../lib/core.php';
		
		//get continent
		$id = $_GET['country'];
		
    // Dependency injection
    $data = array();
    
    //get towns
		$xml = callWS('http://shareyourworld.rest/towns?country_id='.$id);
		$towns = new SimpleXMLElement($xml);
		
		foreach($towns->town as $town)
			$data['towns'][] = array('id' => (string)$town->id[0], 'name' => (string)$town->name[0]);		
    // OUTPUT
    loadResource('view', 'towns', $data);