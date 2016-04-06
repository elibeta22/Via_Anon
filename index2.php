<?php
session_start();

if(isset($_SESSION['username'])){
echo "Hello " . $_SESSION['username']."!";

}else {
echo 'WELCOME';
}

$user = $_SESSION['username'];

$con=mysqli_connect("localhost","root","","via_anon");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

// escape variables for security
$_SESSION['id'] = $_POST['mind_id'];

$mind_id = mysqli_real_escape_string($con, $_POST['mind_id']);
$comments = mysqli_real_escape_string($con, $_POST['comment']);



$sql="INSERT INTO usercomments(mind_image_pair_id,comment,user) 
VALUES ('$mind_id','$comments','$user')";

error_log("mind id=> $mind_id\r\n",3,"/usr/share/nginx/logs/via_non.log");

if (!mysqli_query($con,$sql)) {
 
die('Error: ' . mysqli_error($con));

}

mysqli_close($con);

header("location: ./return_story.php");

?>
