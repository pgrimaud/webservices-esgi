<?php
/**
*   Handler: list
*
*/
require_once '../lib/core.php';

    // Dependency injection
    $data = array();
    
    // Set a default Emplacement
    $data['emplacement'] = array(
        'title'       => "Abidjan Airport",
        'town'        => "Abidjan",
        'country'     => "Côte d'Ivoire",
        'address'     => "123 Avenue de l'Indépendance",
        'rate'        => 3,
        'reviews'     => 2,
        'longitude'   => -34.397,
        'latitude'    => 150.644
    );
    
    // Set a default review
    $data['reviews'] = array(
        array(
            'from' => "Michel Dupont",
            'rate' => 3,
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lorem arcu. Nullam vehicula viverra cursus. Aliquam non laoreet lectus. Suspendisse in euismod diam, vitae sollicitudin neque. Nullam molestie mi eu ante fringilla, in dapibus purus eleifend. Morbi malesuada porta nisl. Proin sed urna eu libero varius blandit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet augue at metus rutrum semper. Sed a faucibus libero."
        )
    );

    // OUTPUT
    loadResource('view', 'list', $data);