<?php
/**
*   Handler: getcountries
*
*/
require_once '../lib/core.php';
		
		//get continent
		$id = $_GET['continent'];
		
    // Dependency injection
    $data = array();
    
    //get countries
		$xml = callWS('http://shareyourworld.rest/countries?continent='.$id);
		$countries = new SimpleXMLElement($xml);
		
		foreach($countries->country as $country)
			$data['countries'][] = array('id' => (string)$country->id[0], 'name' => (string)$country->name[0], 'code' => (string)$country->code[0]);		
    // OUTPUT
    loadResource('view', 'countries', $data);