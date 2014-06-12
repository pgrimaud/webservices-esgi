<?php
require_once 'lib/nusoap.php';
require_once 'lib/config.php';

$namespace = URL_WS_SOAP;

$server = new nusoap_server();
$server->wsdl->schemaTargetNamespace = $namespace;
$server->configureWSDL('WSDLFTW');

$server->wsdl->addComplexType(
    'Review',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id_area' => array('name' => 'id_area', 'type' => 'xsd:int'),
        'author'  => array('name' => 'author', 'type' => 'xsd:string'),
        'content' => array('name' => 'content', 'type' => 'xsd:string'),
        'rate'    => array('name' => 'rate', 'type' => 'xsd:int'),
    )
);

$server->wsdl->addComplexType(
    'GetReviewArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array(
            'ref'             => 'SOAP-ENC:arrayType',
            'wsdl:arrayType' => 'tns:Review[]'
        )
    ),
    'tns:Review'
);

$server->register(
    "GetReviews",
    array("id_area" => "xsd:int"),
    array("return" => "tns:GetReviewArray"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Get users' reviews about the specified area."
);

$server->register(
    "AddReview",
    array(
        'id_area'   => 'xsd:int',
        'author'    => 'xsd:string',
        'content'   => 'xsd:string',
        'rate'      => 'xsd:int'
    ),
    array('return' => 'tns:Review'),
    $namespace,
    false,
    'rpc', // style
    'encoded', // use
    'Add a review.'
);

function GetReviews($id_area)
{
    $reviews = new SimpleXMLElement('data/reviews.xml', NULL, TRUE);
    $result = array();

    foreach($reviews->xpath('//review[id_area="'.$id_area.'"]') as $review) {
        $result[] = array(
            'id_area'   => (int)    $review->id_area,
            'author'    => (string) $review->author,
            'content'   => (string) $review->content,
            'rate'      => (int)    $review->rate
        );
    }

    return $result;
}

function AddReview($id_area, $author, $content, $rate)
{
    $xml = new DOMDocument();
    $xml->load('data/reviews.xml');

    $reviews = $xml->getElementsByTagName('reviews')->item(0);

    $review = $xml->createElement('review');
    $xml->createElement('review');

    $areaElem    = $xml->createElement('id_area', $id_area);
    $authorElem  = $xml->createElement('author', $author);
    $contentElem = $xml->createElement('content', $content);
    $rateElem    = $xml->createElement('rate', $rate);

    $review->appendChild($areaElem);
    $review->appendChild($authorElem);
    $review->appendChild($contentElem);
    $review->appendChild($rateElem);

    $reviews->appendChild($review);

    if($xml->schemaValidate('data/schema.xsd')) {
        $xml->save('data/reviews.xml');
    } else {
        return "Error: input doesn't match xsd schema rules";
    }
    return $xml->saveXML($xml);
}

// create HTTP listener
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
$server->service($POST_DATA);
exit();
