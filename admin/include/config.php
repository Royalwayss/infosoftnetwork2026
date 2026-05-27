<?php
include('db_config.php'); 
try {
	$conn = new mysqli($_host, $_username, $_password,$_database);
} catch (Exception $e) {

}

define('SITE_URL',$SITE_URL);
define('SERVER',$SERVER);
define('BASEURL',$SITE_URL);  
define('WEBSITE_NAME','Infosoftnetwork');  
define('WEBSITE_LOGO',$SITE_URL.'images/infosoft.png');  
define('ADMIN_MAIL','info@infosoftnetwork.com');  
define('FROM_MAIL','info@infosoftnetwork.com');  
?>