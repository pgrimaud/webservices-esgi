<?php

class Rest{
	
	public $header = "<?xml version='1.0' ?>\n";
	private $params = array();
	private $get = array();
	private $post = array();
	
	public function __construct(){
		
		$this->get = $_GET;
		$this->post = $_POST;
		
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
	
	public function getPlaces(){
		
		if(sizeof($this->params) != 2)
			$this->error('Wrong parameters');
				
		$filters = array('name', 'address', 'town_id', 'continent', 'country_id');
		
		$join = false;
		$error = false;
		$filter = ' WHERE ';
		$hasfilter = false;
		
		if(sizeof($this->get) > 0){
			foreach($this->get as $field => $value){
				if(!in_array($field, $filters)){
					$error = 'Unknow filter : '.$field;
				}else{
					//small fix
					if($field == 'continent'){
						$filter.= " c.".addslashes($field)." = '".addslashes($value)."' AND ";
					}elseif($field == 'country_id'){
						$filter.= " t.".addslashes($field)." = '".addslashes($value)."' AND ";
					}else{
						$filter.= " p.".addslashes($field)." = '".addslashes($value)."' AND ";
					}
					$hasfilter = true;
				}
			}
		}
		
		$filter = substr($filter, 0, -4);
		
		if($error != false)
			$this->error($error);
		
		if($hasfilter == true)
			$hasfilter = $filter;
		
		Connexion::getInstance()->query("SELECT p.* FROM place p LEFT JOIN town t ON t.id = p.town_id LEFT JOIN country c ON c.id = t.country_id ".$hasfilter);
		$places = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<places></places>');
		
		foreach($places as $place){
			$cr = $xml->addChild('place');
			foreach($place as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
	
	public function getPlace(){
		
		if(sizeof($this->params) != 3)
			$this->error('Wrong parameters');
				
		//check if place exist
		Connexion::getInstance()->query("SELECT id FROM place WHERE id = '".addslashes($this->params[2])."'");
		$id = Connexion::getInstance()->result();
		
		if($id == '')
			$this->error('Unknow place ID '.addslashes($this->params[2]));
		
		Connexion::getInstance()->query("SELECT * FROM place WHERE id = '".addslashes($this->params[2])."' ORDER BY name");
		$places = Connexion::getInstance()->fetchAll();
		
		$xml = new SimpleXMLElement($this->header.'<places></places>');
		
		foreach($places as $place){
			$cr = $xml->addChild('place');
			foreach($place as $field => $value)
				$cr->addChild($field, $value);
		}
		
		echo $xml->asXML();
		
	}
		
	public function postPlace(){
	
		$params = array('name' => addslashes($this->post['name']), 
								'address' => addslashes($this->post['address']), 
								'town_id' => addslashes($this->post['town']), 
								'description' => addslashes($this->post['description']), 
								'latitude' => addslashes($this->post['latitude']), 
								'longitude' => addslashes($this->post['longitude']));
		
		$error = false;
		
		foreach($params as $param){
			if($error === ''){
				$error = true;
			}
		}
		
		if($error == true)
			$this->error('Missing parameters');
			
			
		Connexion::getInstance()->query("INSERT INTO `place` (name, address, town_id, description, latitude, longitude) 
																	VALUES ('".$params['name']."', '".$params['address']."', '".$params['town_id']."', '".$params['description']."', '".$params['latitude']."', '".$params['longitude']."') ");
		
		//correctly inserted?
		
		Connexion::getInstance()->query("SELECT id FROM `place` WHERE name = '".$params['name']."'
																			AND address = '".$params['address']."' 
																			AND town_id = '".$params['town_id']."'
																			AND description = '".$params['description']."'
																			AND latitude = '".$params['latitude']."'
																			AND longitude = '".$params['longitude']."' ");
		
		$id = Connexion::getInstance()->result();
		
		if((int)$id > 0){
			$xml = new SimpleXMLElement($this->header.'<response></response>');
			$xml->addChild('message', 'ok');
			echo $xml->asXML();
		}else{
			$this->error('Internal error');
		}
		exit;
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