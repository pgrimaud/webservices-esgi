<?php

class Connexion {

    private $connexion;
    private $result;
    public $query;
    private static $_instance = null;

    public function __construct() 
    {
        if (!defined('DB_HOST'))
            die('Maintenance');
        
        $this->connexion = mysql_connect(DB_HOST, DB_USER, DB_PASS);
        mysql_select_db(DB_BASE, $this->connexion);
        $this->query("SET NAMES 'UTF8'");
    }

    public static function getInstance() {
        
        if (is_null(self::$_instance)) {
            self::$_instance = new Connexion();
        }
        return self::$_instance;
    }

    public function query($query) 
    {
        
        $this->query = $query;
        
        $start = microtime(true);
        $this->result = mysql_query($query, $this->connexion);
        $end = microtime(true);
        
        if(!$this->result)
            echo $query.'>'.mysql_error($this->connexion);
        elseif (!$this->result && strlen($query)>0)
            die('Maintenance');
        
        return $this->result;
    }

    public function err(){

        if (mysql_errno($this->connexion))
            return true;

        return false;

    }

    public function echoQuery(){
        return $this->query;
    }

    public function fetch($result = false){
        
        
        if($result)
            return mysql_fetch_assoc($result);
        
        if ($this->result)
        return mysql_fetch_assoc($this->result);
    }

    public function fetchAll(){

        if (!$this->result)
            return;
        
        $array = array();
        while($r = mysql_fetch_assoc($this->result))
                $array[] = $r;
        return $array;
    }

    public function getResult() {
        return $this->result;
    }
		
		public function rows($result = false){
        
        if($result)
            return @mysql_num_rows($result);
        
        return @mysql_num_rows($this->result);
    }
		
		public function result($row = 0){
        if($this->rows() >= 1)
            return mysql_result($this->result, $row);
        return false;
    }		

}