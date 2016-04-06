<!DOCTYPE HTML>
<html>
<head>
<title>Sign-In</title>
<link rel="stylesheet" type="text/css" href="style-sign.css">
<style>
.container {
  width: 1320px;
  height:760px;
  background:white;
  margin: 0 auto;
  border: 1px black;
 position:relative;bottom:75px;
  border-radius:8px;
}

.formpos{
position:relative;top:13em;
}

.mainname{
position:relative;top:250px;left:345px;
font-family:cursive;
font-size:50px;
color:darkred;
width:13em;


}
.fieldcolor{
border-color:darkred;
}
.bodyback {
    background-image: url("http://p1.pichost.me/640/47/1704135.jpg");
    }
.signup{
position:relative;bottom:34.5em;
}


</style>

</head>
<body class="bodyback">
<div class="container">

<div align="center" class="mainname">
<h1>VIA ANON</h1>
</div>

<div id="Sign-In" align="center" class="formpos">
<fieldset style="width:30%" class="fieldcolor"><legend>WELCOME</legend>
<form method="POST" action="connect.php">
User <br><input type="text" name="user" size="40"><br>
Password <br><input type="password" name="pass" size="40"><br>
<input id="button" type="submit" name="submit" value="Log-In">
</form>
</fieldset>

<div align="left" class="signup"><a href="Sign-Up.php">Sign Up</a></div>
</div>

</div>
</body>
</html> 




