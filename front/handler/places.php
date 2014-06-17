<?php
/**
*   Handler: towns
*
*/
require_once '../lib/core.php';
		
    // Dependency injection
    $data = array('emplacements' => array());
    
		//per continent
		if(isset($_GET['continent'])){
			$xml = callWS('http://shareyourworld.rest/places?continent='.addslashes($_GET['continent']));
		}elseif(isset($_GET['country_id'])){
			$xml = callWS('http://shareyourworld.rest/places?country_id='.addslashes($_GET['country_id']));
		}elseif(isset($_GET['town_id'])){
			$xml = callWS('http://shareyourworld.rest/places?town_id='.addslashes($_GET['town_id']));
		}
		
    //get places
		$places = new SimpleXMLElement($xml);
		
		foreach($places->place as $place)
			$data['emplacements'][] = array (
            'title'       => (string)$place->name[0],
            'address'     => (string)$place->address[0],
            'rate'        => 0,
            'reviews'     => 0,
            'description' => (string)$place->description[0]);
			//$data['emplacements'][] = array('id' => (string)$town->id[0], 'name' => (string)$town->name[0]);		
			
    // OUTPUT
    loadResource('view', 'places', $data);