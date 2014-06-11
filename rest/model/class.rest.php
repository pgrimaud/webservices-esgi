<?php

class Rest{
	
	public $header = "<?xml version='1.0' ?>\n";
	public $params = array();
	
	public function __construct(){
		
		$request_method = $_SERVER['REQUEST_METHOD'];
		$this->params = explode('/', $_SERVER['REQUEST_URI']);
		
		$method = strtolower($request_method).ucwords($this->params[1]);
			
		if(method_exists($this, $method)){
			$this->$method();
		}else{
			$this->error('Method '.$this->params[1].' doesn\'t exist');
		}
	}
	
	public function getCountry(){
		
		if(sizeof($this->params) != 3)
			$this->error('Wrong parameters');
		
		$continents = array('europe', 'afrique', 'oceanie', 'amerique', 'asie');
		
		if(!in_array($this->params[2], $continents))
			$this->error('Unknow continent');
		
		Connexion::getInstance()->query("SELECT * FROM country WHERE continent = '".addslashes($this->params[2])."' ORDER BY id");
		$countries = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<countries></countries>');
		
		foreach($countries as $country){
			$cr = $xml->addChild('country');
			foreach($country as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
	
	public function getTown(){
		
		if(sizeof($this->params) != 3)
			$this->error('Wrong parameters');
		
		//check if country exist
		Connexion::getInstance()->query("SELECT id FROM town WHERE country_id = '".addslashes($this->params[2])."'");
		$id = Connexion::getInstance()->result();

		if($id == '')
			$this->error('Unknow country n°'.addslashes($this->params[2]));
				
		Connexion::getInstance()->query("SELECT * FROM town WHERE country_id = '".addslashes($this->params[2])."' ORDER BY id");
		$towns = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<towns></towns>');
		
		foreach($towns as $town){
			$cr = $xml->addChild('town');
			foreach($town as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
	
	public function getPlace(){
		
		if(sizeof($this->params) != 3)
			$this->error('Wrong parameters');
		
		//check if country exist
		Connexion::getInstance()->query("SELECT id FROM place WHERE town_id = '".addslashes($this->params[2])."'");
		$id = Connexion::getInstance()->result();

		if($id == '')
			$this->error('Unknow town n°'.addslashes($this->params[2]));
				
		Connexion::getInstance()->query("SELECT * FROM place WHERE town_id = '".addslashes($this->params[2])."' ORDER BY id");
		$places = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<places></places>');
		
		foreach($places as $place){
			$cr = $xml->addChild('place');
			foreach($place as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
	
	public function error($message){
		
		header("HTTP/1.0 404 Not Found");
		
		$xml = new SimpleXMLElement($this->header.'<error></error>');
		$xml->addChild('message', $message);
		
		echo $xml->asXML();
		
		exit;		
		
	}

}