<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
$errors = '';
$myemail = 'rosemadonauthor@gmail.com';
if( empty($_POST['email']))
{
    $errors .= "\n Error: Email address required";
}

$email_address = $_POST['email']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "New Rose Madon Author subscription: $email_address";
	$email_body = "The email address $email_address has requested to be added to your sexy lesbian porno updates mailing list. If something in this email looks wrong, go yell at Denzelle."; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>