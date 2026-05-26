<?php 
date_default_timezone_set("Asia/Calcutta");
if($_SERVER['HTTP_HOST'] == 'localhost'){
	error_reporting(E_ALL);
	$baseurl = 'http://localhost/infosoftnetwork/';
	$_host = "localhost";
	$_username = "root";
	$_password = "";
	$_database = "infosoftnetwork";
}else{
	error_reporting(0);
	$baseurl = 'https://www.infosoftnetwork.com/';
	$_host = "localhost";
	$_username = "infosoft_networkusr";
	$_password = "6pni~3_s!lg5";
	$_database = "infosoft_network";

}

/*
$conn = new mysqli($_host, $_username, $_password,$_database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}	
*/


define('BASEURL',$baseurl);  
define('WEBSITE_NAME','Infosoftnetwork');  
define('WEBSITE_LOGO',$baseurl.'images/logo.png');  
define('ADMIN_MAIL','info@infosoftnetwork.com');  
define('FROM_MAIL','info@infosoftnetwork.com');  

function validateMobileNumber($mobile) { 
  if (!empty($mobile)) {
    $isMobileNmberValid = TRUE;
    $mobileDigitsLength = strlen($mobile);
    if ($mobileDigitsLength < 10 || $mobileDigitsLength > 15) {
      $isMobileNmberValid = FALSE;
    } else {
      if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $mobile)) {
        $isMobileNmberValid = FALSE;
      }
    } 
	if(strlen($mobile) == 10 || strlen($mobile) == 11 || strlen($mobile) == 12){
		return $isMobileNmberValid;
	}
  } else {
    return false;
  }
}

?>













