<?php
// require_once '../lib/nusoap.php';
require_once 'lib/config.php';

$namespace = URL_WS_SOAP;
// $param = array("name" => "Monotosh Roy");

$client = new SoapClient(URL_WS_SOAP."?wsdl", array("trace" => 1, "exception" => 0));

$result = $client->GetMessage("Dzuuuu");
echo $result;
