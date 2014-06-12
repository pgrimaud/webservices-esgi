<?php
/**
*   Handler: list
*
*/
require_once '../lib/core.php';
require_once '../../soap/client.php';

if(isset($_POST["addReview"]) && $_POST["addReview"]) {
    print_r($_POST);
    exit;


}

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

$soapClient = new EsgiSoapClient();
$data["reviews"] = $soapClient->GetReviews(1);

// OUTPUT
loadResource('view', 'list', $data);
