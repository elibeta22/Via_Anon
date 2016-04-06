<?php

define('DB_HOST','localhost');
define('DB_NAME','anon_accounts');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


function NewUser()
{
	
	$userName = $_POST['user'];
	$password =  $_POST['pass'];
        $email = $_POST['email'];
	$query = "INSERT INTO unknown_info(username, email, password) VALUES ('$userName','$email','$password')";

	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
        error_log("whats hap=> $email\r\n",3,"/usr/share/nginx/logs/via_non.log");
	echo 'GOOD JOB';
	}
}

function SignUp()
{
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM unknown_info WHERE username = '$_POST[user]' AND email = '$_POST[email]' AND password = '$_POST[pass]'") or die(mysql_error());

	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		newuser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
        header("location: ./sign-in.php");
}
?>




