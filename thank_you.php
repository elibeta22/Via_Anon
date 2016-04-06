<HTML>
<HEAD>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel="stylesheet" href="Via_Anon.css">
<h1 class="heading">Via Anon</h1>
<style>
.read {
text-align:center;
font-size:90px;
position:relative;top:1em;
}
.generate {
height:50px;
position:relative;top:1.5em;
}
.menubar {
text-align:right;
position:relative;top:20em;
}


</style>
</HEAD>
<BODY>

<P class="read">Ready to Read?</p>
<form action="return_story.php" method="POST">
<div align="center">
<input class="generate" type="submit" name="submit" value="Generate Anonymous Story">
</div>
<div name="contact" class="pure-menu pure-menu-open pure-menu-horizontal menubar">
<li><a href="#">contact</a> </li>
<li><a href="#">about</a></li>
<li><a href="#">privacy & terms</a></li>
<li><a href="#">help</a></li>
<li><a href="#">F.A.Q</a></li>
</div>
</div>
<div>
<?php
session_start();


if(isset($_SESSION['username'])){
$user = $_SESSION['username']; 

echo "Ready to Discover? " . $user;
}else {
header("location: ./sign-in.php");


}
?>

</div>

</BODY>
</HTML>
