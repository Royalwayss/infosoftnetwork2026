<?php
$to = "rwpttech@gmail.com";
$subject = "Test Mail from PHP";
$message = "This is a test email sent from PHP.";
$headers = "From: info@infosoftnetwork.com";

if(mail($to, $subject, $message, $headers)){
    echo "Mail sent successfully!";
} else {
    echo "Mail failed!";
}
?>