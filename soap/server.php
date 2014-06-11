<?php
require_once 'lib/nusoap.php';
require_once 'lib/config.php';

$namespace = URL_WS_SOAP;

$server = new nusoap_server();
$server->wsdl->schemaTargetNamespace = $namespace;
// $server->configureWSDL("soap_test", "urn:soap_test");
$server->configureWSDL('hellotesting');

$server->wsdl->addComplexType(
	'Comment',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'id_area'	=> array('name' => 'id_area', 'type' => 'xsd:int'),
		'author'	=> array('name' => 'author', 'type' => 'xsd:string'),
		'content'	=> array('name' => 'content', 'type' => 'xsd:string'),
		'rate'		=> array('name' => 'rate', 'type' => 'xsd:int'),
	)
);

$server->wsdl->addComplexType(
	'GetCommentArray',
	'complexType',
	'array',
	'',
	'SOAP-ENC:Array',
	array(),
	array(
		array(
			'ref'			 => 'SOAP-ENC:arrayType',
			'wsdl:arrayType' => 'tns:Comment[]'
		)
	),
	'tns:Comment'
);

$server->register(
	"GetComments",
	array("id_area" => "xsd:int"),
	array("return"  => "tns:GetCommentArray"),
	$namespace,
	false,
	"rpc",
	"encoded",
	"Get users' comments about the specified area."
);

$server->register('AddComment',
	array(
		'id_area'	=> 'xsd:int',
		'author'	=> 'xsd:string',
		'content'	=> 'xsd:string',
		'rate'		=> 'xsd:int'
	),
	array('return' => 'tns:Comment'),
	$namespace,
	false,
	'rpc', // style
	'encoded', // use
	'Add a comment.'
);


function GetComments($id_area)
{
	$comments = new SimpleXMLElement('data/comments.xml', NULL, TRUE);
	$result = array();

	foreach($comments->xpath('//comment[id_area="'.$id_area.'"]') as $comment) {
		$result[] = array(
			'id_area'	=> (int)	$comment->id_area,
			'author'	=> (string)	$comment->author,
			'content'	=> (string)	$comment->content,
			'rate'		=> (int)	$comment->rate
		);
	}

	return $result;
}

function AddComment($id_area, $author, $content, $rate)
{
	$data = file_get_contents('data/comments.xml');

	$xml = new SimpleXMLElement($data);

	$comments = $xml->xpath('//comments');
	$comments = $comments[0];

	$comment = $comments->addChild('comment');
	$comment->addChild('id_area', $id_area);
	$comment->addChild('author', $author);
	$comment->addChild('content', $content);
	$comment->addChild('rate', $rate);

	file_put_contents('data/comments.xml', $xml->asXML());

	$result = array(
		'id_area'	=> $id_area,
		'author'	=> $author,
		'content'	=> $content,
		'rate'		=> $rate
	);

	return $result;
}



// create HTTP listener
// $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
// $server->service($HTTP_RAW_POST_DATA);
$server->service($POST_DATA);
exit();
