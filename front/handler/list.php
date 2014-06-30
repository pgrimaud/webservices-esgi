<?php
/**
*   Handler: list
*
*/
require_once '../lib/core.php';
require_once '../../soap/client.php';

if(isset($_POST["addReview"]) && $_POST["addReview"]) {
    $soapClient = new EsgiSoapClient();
    $soapClient->AddReview($_POST["place_id"], $_POST["name"], $_POST["review"], $_POST["note"]);
}

if(isset($_GET["place"]) && $_GET["place"] != "") {
    $xml = callWS('http://localhost/workspace/webservices-esgi/rest/place/' . $_GET["place"]);
    $place = new SimpleXMLElement($xml);
    foreach($place as $value) {
        $aPlace["title"]    = (string)$value->name[0];
        $aPlace["address"]  = (string)$value->address[0];
        $aPlace["long"]     = (string)$value->longitude[0];
        $aPlace["lat"]      = (string)$value->latitude[0];
        $aPlace["town"]     = (string)$value->town_id[0];
    }

    $xml = callWS('http://localhost/workspace/webservices-esgi/rest/town/' . $aPlace["town"]);
    $town = new SimpleXMLElement($xml);
    foreach($town as $value) {
        $town = (string)$value->name[0];
        $country = (string)$value->country_id[0];
    }

    $xml = callWS('http://localhost/workspace/webservices-esgi/rest/country/' . $country);
    $country = new SimpleXMLElement($xml);
    foreach($country as $value) {
        $country = (string)$value->name[0];
    }

    // Dependency injection
    $data = array();

    // $town
    $soapClient = new EsgiSoapClient();
    $data["reviews"] = $soapClient->GetReviews($_GET["place"]);

    $nbReview = count($data["reviews"]);
    $rate = null;
    if($nbReview > 0) {
        $aRate = array();
        foreach ($data["reviews"] as $key => $review) {
            array_push($aRate, $review["rate"]);
        }
        $rate = array_sum($aRate) / count($aRate);
    }

    // Set a default Emplacement
    $data['emplacement'] = array(
        'id'          => $_GET["place"],
        'title'       => $aPlace["title"],
        'town'        => $town,
        'country'     => $country,
        'address'     => $aPlace["address"],
        'rate'        => $rate,
        'reviews'     => $nbReview,
        'longitude'   => $aPlace["long"],
        'latitude'    => $aPlace["lat"]
    );

}

// OUTPUT
loadResource('view', 'list', $data);
