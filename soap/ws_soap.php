<?php
require_once '../lib/nusoap.php';
require_once '../lib/config.php';

$namespace = URL_WS_SOAP;

$server = new soap_server();
$server->wsdl->schemaTargetNamespace = $namespace;
// $server->configureWSDL("soap_test", "urn:soap_test");
$server->configureWSDL('hellotesting');


//register a function that works on server
$server->register(
            "GetMessage",
            array("name" => "xsd:string"),
            array("return" => "xsd:string"),
			$namespace,
			false,
            // "urn:soap_test",
            // "urn:soap_test#GetMessage",
            "rpc",
            "encoded",
            "Get welcome message"
          );

// create the function
function GetMessage($your_name)
{
  if(!$your_name) {
    return new soap_fault('Client','','Put Your Name!');
  }
  $result = "Welcome to ".$your_name .". Thanks for Your First Web Service Using PHP with SOAP";
  return $result;
}
// create HTTP listener
// $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
// $server->service($HTTP_RAW_POST_DATA);
$server->service($POST_DATA);
exit();
