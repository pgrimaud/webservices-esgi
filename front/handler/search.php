<?php
/**
*   Handler: search
*
*/
require_once '../lib/core.php';

    // Dependency injection
    $data = array();
    
    // Set a default Continent
    $data['search'] = array(
        'continent' => array(
            'africa' => 'Africa', 
						'america' => 'America', 
						'asia' => 'Asia', 
						'europe' => 'Europe', 
						'oceania' => 'Oceania', 
        )
    );
    
		$data['emplacements'] = array();
    // OUTPUT
    loadResource('view', 'search', $data);