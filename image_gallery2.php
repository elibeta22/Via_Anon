<!DOCTYPE html>

<html>




<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>Image Gallery</h2>
  <p>The .thumbnail class can be used to display an image gallery. Click on the images to see it in full size:</p>            
  <div class="row">
    <div class="col-md-4">
     
       <?php
$con=mysqli_connect("localhost","root","","via_anon");
$sql_get_next = "SELECT id ,date_uploaded, mind, audio_path, image_path, video_path FROM mind_image";


$result = mysqli_query($con,$sql_get_next);
								mysqli_data_seek($result,0);
								
								
								
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	
	
	echo "<img src=".$row['image_path']." %nbsp; class='gallery-item'>";
	
	
}
	?>
      
    </div>
    
</body>
</html>
