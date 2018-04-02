<?php

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'cffmysql');
define('DB_NAME', 'cff');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

?>