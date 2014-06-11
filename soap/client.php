<?php
class EsgiSoapClient
{

	public $client;

	public function __construct()
	{
		require_once 'lib/nusoap.php';
		require_once 'lib/config.php';

		$namespace = URL_WS_SOAP;
		$this->client = new nusoap_client(URL_WS_SOAP."?wsdl");
	}


	/**
	 * Add a comment to an area 
	 *
	 * @param  int  $id_area Area's id which is commented 
	 * @param  string  $author  The name of the author 
	 * @param  string  $content  The content of the comment 
	 * @param  int  $rate  The rate of the area, 1-10 
	 * @return  array  The new comment created with all his values
	 */
	public function AddComment($id_area, $author, $content, $rate)
	{
		$err = $this->client->getError();
		if ($err) {
			return $err;
		}

		$result = $this->client->call('AddComment', 
			array(
				'id_area'	=> $id_area,
				'author'	=> $author, 
				'content'	=> $content, 
				'rate'		=> $rate
			)
		);

		return $result;
	}


	/**
	 * Get all comments of an area
	 *
	 * @param  int  $id_area Area's id which is commented 
	 * @return  array  All comments created with all his values of an area
	 */
	public function GetComments($id_area)
	{
		$err = $this->client->getError();
		if ($err) {
			return $err;
		}

		$result = $this->client->call("GetComments", array("id_area" => $id_area));

		return $result;
	}
}
