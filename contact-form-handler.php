<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
$errors = '';
$myemail = 'rosemadonauthor@gmail.com';
$cute = ['I love your deep, beautiful eyes. I feel so peaceful looking into them.', 'I love how you laugh so easily! You make me feel like the funniest girl in the world.', 'I fantasize about your freshly made pancakes.', 'Every time I look at the ring you got me, I remember you getting down on one knee with me...', 'The comfort of your arms, the companionship you give me... I am so lucky.', 'You are so brilliant. Your ideas never fail to bring me joy.', 'The life we have together is already more than I ever dreamed of.', 'To spend every day with you, performing mundane tasks, taking out the garbage, hanging up the washing, feeding the cat... what bliss.', '"This is your life, it isn\'t much - learning to live, learning to touch - pulling the brakes, but still the wheels keep turning around...\" this slow, lazy life with you is everything I need.', 'Song lyrics: \"She makes my heart a cinema-scope screen, showing a dancing bird of paradise...\"', '"Gimme a chance! I\'ll do my best to kick and scream and dance. When winter comes, I\'ll turn around... Take me back to the sweet times, the hot nights. Everything is gonna be alright... in the summertime, baby, in the summertime. Even if I have to wait til next year, I don\'t care, all I know is that I\'ll meet you there... in the summertime.\"','\"To you I am nothing more than a fox like a hundred thousand other foxes. But if you tame me, then we shall need each other. To me, you will be unique in all the world. To you, I shall be unique in all the world...\"','\"You - you alone will have the stars as no one else has them...In one of the stars I shall be living. In one of them I shall be laughing. And so it will be as if all the stars were laughing, when you look at the sky at night...You - only you - will have stars that can laugh.\"','\"I remembered the fox. One runs the risk of crying a bit if one allows oneself to be tamed.\"','\"Have you ever heard the wonderful silence just before the dawn? Or the quiet and calm just as a storm ends? Or perhaps you know the silence when you haven\'t the answer to a question you\'ve been asked, or the hush of a country road at night, or the expectant pause of a room full of people when someone is just about to speak, or, most beautiful of all, the moment after the door closes and you\'re alone in the whole house? Each one is different, you know, and all very beautiful if you listen carefully.\"','\"Many places you would like to see are just off the map and many things you want to know are just out of sight or a little beyond your reach. But someday you\'ll reach them all, for what you learn today, for no reason at all, will help you discover all the wonderful secrets of tomorrow.\"'];

    $randomlove = $cute[mt_rand(0, count($cute) - 1)];

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
	$email_body = "The email address $email_address has requested to be added to your fun content mailing list. If something in this email looks wrong, go bother your future wife. Here is a randomly selected message from her: $randomlove"; 
	 
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