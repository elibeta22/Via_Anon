<?php

session_start(); 
define('DB_HOST', 'localhost');
define('DB_NAME', 'anon_accounts');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn()
{

   /* starting the session for user profile page */
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$query = mysql_query("SELECT *  FROM unknown_info where username = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error());
	$row = mysql_fetch_array($query) or die(mysql_error());
	if(!empty($row['username']) AND !empty($row['password']))
	{      
                $user = $row['username'];
        	$_SESSION['username'] = $row['username'];
            $id = $row['id'];
				$_SESSION['id']= $row['id'];
                header("Location: mainpage.php");
	        
	}
	else
	{
	echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}
}
}
if($row['username'] != $_POST[user]){
header("Location: sign-in-error.php");
}
if(isset($_POST['submit']))
{
	SignIn();
}

?>



