<?php
include('admin/include/config.php');
$data = $_POST;
$err = '';



if(isset($data['first_name']) && $data['first_name'] != ''){
	$first_name = $data['first_name'];
}else{
	$first_name ='';
	$err = 1;
}

if(isset($data['last_name']) && $data['last_name'] != ''){
	$last_name = $data['last_name'];
}else{
	$last_name ='';
	$err = 1;
}


if(isset($data['email']) && $data['email'] != ''){
	if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $err = 1;
		$email  = '';
     }else{
		 $email = $data['email'];
	 }
}else{
	$err = 1;
	$email  = '';
	
}

if(isset($data['phone']) && $data['phone'] != ''){
	$phone = $data['phone'];
}else{
	$phone ='';
	$err = 1;
}


if(isset($data['message']) && $data['message'] != ''){
	$message = $data['message'];
}else{
	$message ='';
	$err = 1;
}



if($_SERVER['HTTP_HOST'] != 'localhost'){
if(!empty($_POST)){
		$recaptcha_secret = '6LdMDv8sAAAAADy57vtvRaLAqLktTZEvW3vpNBt0';
		$recaptcha_response = $_POST['g-recaptcha-response'];

		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$res_data = [
			'secret' => $recaptcha_secret,
			'response' => $recaptcha_response
		];

		$options = [
			'http' => [
				'method' => 'POST',
				'content' => http_build_query($res_data)
			]
		];

		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$json = json_decode($result);

		if ($json->success) {
		  
		} else { 
		   //	$err = 1;
		} 
   }
   }





if($err == ''){  

          $created_at = date('Y-m-d H:i:s');
          $sql = 'insert into contacts (first_name,last_name,phone,email,message,created_at) values ("'.$first_name.'","'.$last_name.'","'.$phone.'","'.$email.'","'.$message.'","'.$created_at.'")';
          $conn->query($sql); 

$mail_message = "<html>
			   <head>
			   </head>
			   <body>
				  <table width='80%' border='0' cellpadding='3' cellspacing='3' style='border:#EFEFEF 5px solid; padding:5px;'>
					 <tr>
						<td  align='left' valign='middle'>
						
						<h3>".WEBSITE_NAME."</h3>
						
						</td>
					 </tr>
					  <tr>
						<td class='style2'>Hi admin!  New contact form has been recived from ".WEBSITE_NAME."</td>
					 </tr>
					 <tr>
						<td>&nbsp;</td>
					 </tr>
					 <tr>
						<td align='left' valign='middle'>
						   <table width='98%' border='0' align='right' cellpadding='5' cellspacing='5' style='background-color:#F5F5F5'>
							  
							  <tr>
								 <td width='30%' align='left' valign='top' class='style2'>First Name</td>
								 <td width='5%' align='left' valign='top' class='style2'>:</td>
								 <td width='65%' align='left' valign='top' class='style3'>".$first_name."</td>
							  </tr>
							     <tr>
								 <td width='30%' align='left' valign='top' class='style2'>Last Name</td>
								 <td width='5%' align='left' valign='top' class='style2'>:</td>
								 <td width='65%' align='left' valign='top' class='style3'>".$last_name."</td>
							  </tr>
							 <tr>
								 <td width='30%' align='left' valign='top' class='style2'>Email</td>
								 <td width='5%' align='left' valign='top' class='style2'>:</td>
								 <td width='65%' align='left' valign='top' class='style3'>".$email."</td>
							  </tr>
							   <tr>
								 <td width='30%' align='left' valign='top' class='style2'>Phone</td>
								 <td width='5%' align='left' valign='top' class='style2'>:</td>
								 <td width='65%' align='left' valign='top' class='style3'>".$phone."</td>
							  </tr>
							  <tr>
								 <td width='30%' align='left' valign='top' class='style2'>Message</td>
								 <td width='5%' align='left' valign='top' class='style2'>:</td>
								 <td width='65%' align='left' valign='top' class='style3'>".$message."</td>
							  </tr>
							  </table>
						</td>
					 </tr>
					
					 <tr>
						<td>&nbsp;</td>
					 </tr>
					 
				  </table>
			   </body>
			</html>";  
			
			
			
			
			
			if($_SERVER['HTTP_HOST'] != 'localhost'){
				
				
				$recipient = ADMIN_MAIL;
				$message = $mail_message;  
			
				$headers = "Content-Type: text/html; charset=UTF-8\r\n";
				$headers .= 'From: '.trim(WEBSITE_NAME). '<'.FROM_MAIL.'>'."\r\n";
				 $subject = 'New contact form has been recived from'.WEBSITE_NAME;
				$headers .= 'Cc: manjit@rtpltech.com' . "\r\n"; 
				mail($recipient, $subject, $message, $headers); 
				
				
				
			}


			
            $_SESSION['_msg'] = 'Thanks for contacting us. We will get back to you soon.';
		    echo '<script>window.location.href="thanks.php"; </script>'; die;
}else{
	        echo '<script>window.location.href="index.php"; </script>'; die;
}



?>