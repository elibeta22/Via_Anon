<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<style>
.container {
  
  width: 1360px;
  height:820px;
  background: #FFFFFF;
  margin-right:400px;
  margin: auto;
  border: 1px black;
 position:relative;bottom:35px; 
}
.heading{
color:darkred;
background-color:black;
text-align:left;
font-size:50px;

}
#anonpos {
position:relative;left:50px;
font-size:35px;
}

#fingerpos{
position:relative;left:80px;
}
.fingercommentpos {
position:relative;left:120px;bottom:60px;
font-size:20px;
}
.attachpos{
position:relative;left:80px;bottom:20px;
}
.attachcommentpos {
position:relative;left:110px;bottom:70px;
font-size:20px;
}
.questionpos {
position:relative;left:80px;bottom:40px;
}
.questioncommentpos {
position:relative;left:120px;bottom:100px;
font-size:20px;
}
.flowerpos {
position:relative;left:80px;bottom:60px;
}
.flowercommentpos {
position:relative;left:130px;bottom:120px;
font-size:20px;
}
.releasepos {
background-color:silver;
color:black;

position:relative;top:40px;right:150px;
}
input:hover[name=release] {
color:white;
}
.menubarpos {
position:relative;bottom:490px;
}
.share {
position:relative;top:25px;
font-size:30px;
}
body {
    background-color:silver;

}
.userpos{

color:darkred;
font-size:35px;
}
.logpos{

position:relative;top:300px;
font-size:20px;
}
#formaction{
position:relative;bottom:700px;right:30px;

}
.attachform{
position:relative;left:30px;
}


}
</style>
</head>
<body>


<div class="container">

<div align="left" class="userpos">
<h1 class="heading">Via Anon_<a class="userpos">
<?php

session_start();


if(isset($_SESSION['username'])){
echo "Hello " . $_SESSION['username']."!";

}else {
header("location: ./sign-in.php");
}
?>
</a>
</h1>
</div>



<div>    

    
<p id="anonpos" class="text-size1">Anonymously share with others!</br> You'll never know what you will get in return.</p></br>

<img id="fingerpos" width="40" src="https://encrypted-tbn1.gstatic.com/imags?q=tbn:ANd9GcQeQgeN-Nx6m8Nl8yPzDWgyshwAv_ibLEg_lWWj8aTv46a5KIEQ"><p class="fingercommentpos">-Post whats on your mind, and connect with the world.</p></br>

<img class="attachpos" width="35" src="https://cdn4.iconfinder.com/data/icons/miu/22/editor_attachment_paper_clip_2-128.png">
<p class="attach-comment attachcommentpos">-Attach images and videos, remember a picture can mean a thousand words.</p></br>

<img class="questionpos" width="35" src="http://www.flaticon.com/png/256/8235.png">
<p class="question-comment questioncommentpos">-Don't be afraid to express yourself, everything you post will remain a secret,thats if</br> you want it to be. </p>

<img class="flowerpos" width="40" src="http://upload.wikimedia.org/wikipedia/commons/a/a1/Five-petal_flower_icon.white.svg">

<p class="flower-comment flowercommentpos">-Share your experiences and help form a unity with your stories. This could be the first step to</br> building your following. </p>

</div>


<div id="formaction" align="right">

    <p class="share">What would you like to share?</p>

    <form action="via_anon_script.php" method="post" enctype="multipart/form-data">
  <textarea rows="10" cols="48"  name="mind" ></textarea> </br>

Attachment: <INPUT TYPE="file" NAME="image" MAXLENGTH=100 ALLOW="text/*"></p>

<input type="submit" class="pure-button pure-button-primary releasepos" value="Release">
</form>


<a class="logpos" href="logout.php">Log Me Out Please</a>

</div>


    



    
  
 





</div>


</body>

</html>
