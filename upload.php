<?php

include('db.php');
if(isset($_POST['submit'])){
	
	$name= $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$location = 'Via_anon';
	$target = 'Via_anon'.$name;
	
	if(move_uploaded_file($tmp_name,$location)){
		echo 'file upoaded';
		$nam = $_POST['nam'];
		$query = mysqli_query($con, "INSERT INTO image(p_img,p_title)values('$target','$nam')");
		
		
		
		
	}else{
		echo "did not work";
		
		
	}
	
	
	
	}
$result = mysqli_query($con, "Select from image");
while($row = mysqli_fetch_aray($result)){
	
	
	echo "<img src=".$row['p_img']." %nbsp; class='im'>";
	
	
}

?>