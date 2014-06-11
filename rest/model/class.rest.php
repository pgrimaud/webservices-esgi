<?php

class Rest{
	
	public $header = "<?xml version='1.0' ?>\n";
	public $params = array();
	public $get = array();
	
	public function __construct(){
		
		$this->get = $_GET;
		
		$request_method = $_SERVER['REQUEST_METHOD'];
		$this->params = explode('/', $_SERVER['REQUEST_URI']);
		
		if(isset($_GET)){
			$tmp = explode('?', $this->params[1]);
			$param = $tmp[0];
		}else{
			$param = $this->params[1];
		}
		
		$method = strtolower($request_method).ucwords($param);
			
		if(method_exists($this, $method)){
			$this->$method();
		}else{
			$this->error('Method '.$this->params[1].' doesn\'t exist');
		}
	}
	
	public function getCountries(){
		
		if(sizeof($this->params) != 2)
			$this->error('Wrong parameters');
				
		$filters = array('name', 'code', 'continent');
		
		$error = false;
		$filter = ' WHERE ';
		$hasfilter = false;
		
		if(sizeof($this->get) > 0){
			foreach($this->get as $field => $value){
				if(!in_array($field, $filters)){
					$error = 'Unknow filter : '.$field;
				}else{
					$filter.= " ".addslashes($field)." = '".addslashes($value)."' AND ";
					$hasfilter = true;
				}
			}
		}
		
		$filter = substr($filter, 0, -4);
		
		if($error != false)
			$this->error($error);
		
		if($hasfilter == true)
			$hasfilter = $filter;
		
		Connexion::getInstance()->query("SELECT * FROM country ".$hasfilter);
		$countries = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<countries></countries>');
		
		foreach($countries as $country){
			$cr = $xml->addChild('country');
			foreach($country as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
	
	public function getCountry(){
		
		if(sizeof($this->params) != 3)
			$this->error('Wrong parameters');
				
		//check if country exist
		Connexion::getInstance()->query("SELECT id FROM country WHERE id = '".addslashes($this->params[2])."'");
		$id = Connexion::getInstance()->result();
		
		if($id == '')
			$this->error('Unknow country ID '.addslashes($this->params[2]));
		
		Connexion::getInstance()->query("SELECT * FROM country WHERE id = '".addslashes($this->params[2])."' ORDER BY name");
		$countries = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<countries></countries>');
		
		foreach($countries as $country){
			$cr = $xml->addChild('country');
			foreach($country as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
	
	public function getTowns(){
		
		if(sizeof($this->params) != 2)
			$this->error('Wrong parameters');
				
		$filters = array('name', 'population', 'country_id');
		
		$error = false;
		$filter = ' WHERE ';
		$hasfilter = false;
		
		if(sizeof($this->get) > 0){
			foreach($this->get as $field => $value){
				if(!in_array($field, $filters)){
					$error = 'Unknow filter : '.$field;
				}else{
					$filter.= " ".addslashes($field)." = '".addslashes($value)."' AND ";
					$hasfilter = true;
				}
			}
		}
		
		$filter = substr($filter, 0, -4);
		
		if($error != false)
			$this->error($error);
		
		if($hasfilter == true)
			$hasfilter = $filter;
		
		Connexion::getInstance()->query("SELECT * FROM town ".$hasfilter);
		$towns = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<towns></towns>');
		
		foreach($towns as $town){
			$cr = $xml->addChild('town');
			foreach($town as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
	
	public function getTown(){
		
		if(sizeof($this->params) != 3)
			$this->error('Wrong parameters');
				
		//check if town exist
		Connexion::getInstance()->query("SELECT id FROM town WHERE id = '".addslashes($this->params[2])."'");
		$id = Connexion::getInstance()->result();
		
		if($id == '')
			$this->error('Unknow town ID '.addslashes($this->params[2]));
		
		Connexion::getInstance()->query("SELECT * FROM town WHERE id = '".addslashes($this->params[2])."' ORDER BY name");
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
			$this->error('Unknow town ID '.addslashes($this->params[2]));
				
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
	
	public function postPlaces(){
	
	}
	
	public function filters(){
	
	}
	
	public function error($message){
		
		header("HTTP/1.0 404 Not Found");
		
		$xml = new SimpleXMLElement($this->header.'<error></error>');
		$xml->addChild('message', $message);
		
		echo $xml->asXML();
		
		exit;		
		
	}

}