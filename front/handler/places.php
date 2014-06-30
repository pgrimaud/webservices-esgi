<?php
/**
*   Handler: towns
*
*/
require_once '../lib/core.php';
require_once '../../soap/client.php';

$soapClient = new EsgiSoapClient();

    // Dependency injection
    $data = array('emplacements' => array());

        //per continent
        if(isset($_GET['continent'])){
            $xml = callWS('http://localhost/workspace/webservices-esgi/rest/places?continent='.addslashes($_GET['continent']));
        }elseif(isset($_GET['country_id'])){
            $xml = callWS('http://localhost/workspace/webservices-esgi/rest/places?country_id='.addslashes($_GET['country_id']));
        }elseif(isset($_GET['town_id'])){
            $xml = callWS('http://localhost/workspace/webservices-esgi/rest/places?town_id='.addslashes($_GET['town_id']));
        }

    //get places
        $places = new SimpleXMLElement($xml);

        foreach($places->place as $place) {
            $reviews = $soapClient->getReviews($place->id[0]);
            $data['emplacements'][] = array (
            'id'          => (string)$place->id[0],
            'title'       => (string)$place->name[0],
            'address'     => (string)$place->address[0],
            'rate'        => 0,
            'reviews'     => 0,
            'description' => (string)$place->description[0],
            // 'reviews' => sizeof($soapClient->getReviews(1))
            'reviews' => (int)sizeof($soapClient->getReviews($place->id[0]))
            );
        }

    // OUTPUT
    loadResource('view', 'places', $data);
