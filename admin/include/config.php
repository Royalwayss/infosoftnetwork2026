<?php
if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost:8000'){
	$SERVER = 'local';
	$SITE_URL = 'http://localhost:8000/';
}else{
	$SITE_URL = 'https://www.infosoftnetwork.com/';
	$SERVER = 'live';
}
define('SITE_URL',$SITE_URL);
define('SERVER',$SERVER);
?>