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
            1 => 'Africa', 
						2 => 'America', 
						3 => 'Asia', 
						4 => 'Europe', 
						5 => 'Oceania', 
        )
    );
    
    // Set a default Emplacement
    $data['emplacements'] = array(
        array (
            'title'       => "Abidjan Airport",
            'address'     => "123 Avenue de l'Indépendance",
            'rate'        => 3,
            'reviews'     => 2,
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lorem arcu. Nullam vehicula viverra cursus. Aliquam non laoreet lectus. Suspendisse in euismod diam, vitae sollicitudin neque. Nullam molestie mi eu ante fringilla, in dapibus purus eleifend. Morbi malesuada porta nisl. Proin sed urna eu libero varius blandit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet augue at metus rutrum semper. Sed a faucibus libero."
        )
    );

    // OUTPUT
    loadResource('view', 'search', $data);