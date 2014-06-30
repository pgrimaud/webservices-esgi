<?php

//database

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'loukai');
define('DB_BASE', 'places');

//path

define('ROOT_PATH', dirname(__FILE__).'/');

//autoload

spl_autoload_register('defaultAutoload');

//usefull functions

function defaultAutoload($class_name) {

	if ((file_exists(ROOT_PATH.'model/class.'. strtolower($class_name) .'.php')))
		require_once ROOT_PATH.'model/class.'. strtolower($class_name) .'.php';

}

function show($data){
	echo '<pre>';
	print_r($data);
	exit;
}
