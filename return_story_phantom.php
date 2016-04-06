<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="Via_Anon.css">
<style>
.contain {
  width: 1300px;
  height:200px;
  background: #FFFFFF;
  margin: 0 auto;
  bordercolor: 10px skyblue;
  position:relative;bottom:27px;
}
.heading{
color:darkred;
background-color:black;
text-align:left;
font-size:40px;

}
body {
    background-image: url("http://us.123rf.com/450wm/panos3/panos31212/panos3121200006/16747500-.jpg");
    }
.fontsize{
font-size:40px;
}

table{
margin-top:0px;
width:40%;

}

tr{
height:3%;
text-align:center;
margin:0px;
}
#comment_form{


}




</style>
</head>
<body>


<div style="height:auto; width:auto" class="contain">





<div>

<?php
session_start();

// Connect to database server
$con=mysqli_connect("localhost","root","","via_anon");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// SQL queries
// This will return a random record from rob_mind_image_pair
// the mysql rand() function is very slow with a lot of records.  look at the link below for alternatives.
// http://akinas.com/pages/en/blog/mysql_random_row/


//ROBERT TAKE A LOOK AT THIS 

if(isset($_SESSION['username'])){
$user = $_SESSION['username'];

}else{
header("Location: sign-in.php");


}

if(isset($_SESSION['id'])){
$tmpid = $_SESSION['id'];

$SQL_GET_MIND = "SELECT id, mind, audio_path, image_path FROM mind_image where id=$tmpid";
unset($_SESSION['id']);



}else{
$SQL_GET_MIND = "SELECT id, mind, audio_path, image_path FROM mind_image ORDER BY RAND() LIMIT 0,1";
$tmpid = 92221992;
}



// Execute the query (the recordset $rs contains the result)
$result = mysqli_query($con,$SQL_GET_MIND);
mysqli_data_seek($result,0);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$mind = $row["mind"];
$audio = $row["audio_path"];
$image = $row["image_path"];
$id = $row["id"];

error_log("imagge=> $image\r\n",3,"error_log.php");
//execute the query of comments




//ROBERT TAKE A LOOK AT THIS
if($tmpid != 92221992){
$SQL_GET_COMMENTS = "SELECT id, mind_image_pair_id, comment, user from usercomments where mind_image_pair_id = $tmpid order by id desc";
unset($_SESSION['id']);
}else{
$SQL_GET_COMMENTS = "SELECT id, mind_image_pair_id, comment, user from usercomments where mind_image_pair_id = $id";

}





$commentresult = mysqli_query($con,$SQL_GET_COMMENTS);

?>
</div>




<div>
<h1 class="heading">From Anonymous:</h1>
<div>











<form><input type=button value="New Story" onClick="window.location.reload()"></form> 
</div>

</div>
<div align="center" class="fontsize">
<?php
if (!is_null($mind)){
   echo $mind, "</br>";
   
}
if (!is_null($image)){
   
echo "<img src='$image' />";
      

}else{
echo "<audio id='audio_1' controls preload autoplay='autoplay' loop><source src='$audio' /></audio>";

}
?>
</div>
<div align="center" id="comment_form">

<div>

<form action="like_dislike_script.php" method="POST">
<INPUT TYPE="submit" NAME="like" value="like">
<INPUT TYPE="submit" NAME="dislike" value="dislike">
<?php
echo "<input type=\"hidden\" name=\"mind_id\" value=\"$id\">";

?>
</form>

<div>
<?php
if(isset($_SESSION['likes']) or isset($_SESSION['dislikes'])){
	$likes = $_SESSION['likes'];
	$dislikes = $_SESSION['dislikes'];
	echo $likes ."|". $dislikes . '</br>';
    	
	$like_percentage = $_SESSION['likesPercentage'] . '%';
	$dislike_percentage = $_SESSION['dislikesPercentage'] . '%';
	

	error_log("like final per info=> $like_percentage\r\n",3,"error_log.php");
	error_log("dislike final info=> $dislike_percentage\r\n",3,"error_log.php");

	 include("special_meters.php");

    $meters = '<div class="leftlikes" align="center"></div><div class="rightdislikes"></div>';
	 echo $meters;
header("location: ./return_story2.php");
}else{
	
	
	
}

?>


</div>



</div>






<form action="index2.php" method="POST">
<table>

<tr><td colspan="2">Comment: </td></tr>
<tr><td colspan="2"><textarea name="comment"></textarea></td></tr>


<?php
echo "<input type=\"hidden\" name=\"mind_id\" value=\"$id\">";

?>

<tr><td colspan="2"><input type="submit" name="submit" value="comment"/></td></tr></table>
</form>




</div>




<div align="center" class="fontsize" id="comment_result">
<?php
while ($row = mysqli_fetch_array($commentresult)) {
  
    echo "<table border='1'><tr>";
       echo '<th>',$row[3],'</th>','<td>',$row[2],'</td>';
       echo '</tr>';
   echo '</table>';
    
   error_log("comment id=> $row[3], comment => $row[2]\r\n",3,"error_log.php");
}






mysqli_close($con);
?>

</div>

</div>
</div>

</body>
</html>
