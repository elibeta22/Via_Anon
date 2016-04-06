<html>
<head>
<h1 class="heading">Via Anon </h1>
<title>Rob's version</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel="stylesheet" href="Via_Anon.css">
</head>



<?php
date_default_timezone_set('US/Eastern');

$script_tz = date_default_timezone_get();
                   // 7 days; 24 hours; 60 mins; 60 secs
$date =   date('m-d-Y');






//connecting to database
							$con=mysqli_connect("localhost","root","","via_anon");
							
							//incase of mysql connection 
							if (mysqli_connect_errno()) {
							echo "Failed to connect to MySQL: " . mysqli_connect_error();	
							}
								
							
							//prepare new incremented # for for next mind_image slot
							$sql_get_next_id = 'SELECT auto_increment FROM information_schema.TABLES WHERE TABLE_SCHEMA = "via_anon" AND TABLE_NAME = "mind_image"';
							
							//preparing mind 
							$mind = mysqli_real_escape_string($con, $_POST['mind']);
							
							 $result = mysqli_query($con,$sql_get_next_id);
								mysqli_data_seek($result,0);
								$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
								$mind_id = $row["auto_increment"];
	  
								error_log("path info=> $mind_id\r\n",3,"error_log.php");



								$extension = substr(strrchr($_FILES['image']['name'], "."), 1);
								error_log("extension info=> $extension\r\n",3,"error_log.php");
								$mp3 = "mp3";
	                            $mp4 = "mp4";
								$MOV = "MOV";
					
					
					if(($extension != $mp3) and ($extension!=$mp4) and ($extension!=$MOV)){
		
		
		
		
	
	
	
	
						// Preparing the variable.
						$name=  $_FILES['image']['name'];
						$temp=  $_FILES['image']['tmp_name'];
						$type=  $_FILES['image']['type'];
						$size=  $_FILES['image']['size'];
						
						if($type == 'image/jpeg'){ 
						$filetype = '.jpg';
							
							
						}else{
							
							$filetype = str_replace('image/', '', $type);}

						
						
						
						
						$file_name = "_image_".$mind_id."_".$_FILES['image']['name'];     
						$file_name = preg_replace('/\s+/', '', $file_name);
						$path=	'Via_anon' . md5(rand(0, 1000) . rand(0, 1000) . rand(0, 1000) . rand(0, 1000)) . $filetype;
						$thumb_path=	'Via_anon'  . $file_name;
						$size2= getimagesize($temp);
						$width= $size2[0];
						$height= $size2[1];

						// Requirements
						$maxwidth= 4000;
						$maxheight= 4000;
						$allowed= array( 'image/jpeg', 'image/png', 'image/gif' , 'image/mp3');
						
						// Echo the data.
						
	
		
		if(in_array( $type, $allowed)){
				
				if($width < $maxwidth && $height < $maxheight ){
					
					if ($size < 20971520){
						
						
						// Check the shape of the image
						if($width == $height){$case=1; }
						if($width < $height){$case=2; }
						if($width > $height){$case=3; }
						
						switch($case){
							
							//square
							case 1:
							
							$newwidth = 500;
							$newheight = 500;
							
							
							break;
							
							//Lying rectangle
							case 2:
							
							$newheight = 500;
							$ratio = $newheight / $height; 
							$newwidth = round($width * $ratio);
							
							echo $newwidth. 'x' .$newheight;
							break;
							
							//standing rectangle
							case 3:
							
							$newwidth = 500;
							$ratio = $newwidth / $width;
							$newheight = round($height * $ratio);
							
							echo $newwidth. 'x' .$newheight;
							
							break;
							
							
							
						}
						
						switch($type){   
						
							case 'image/jpeg':
							
								$img = 		imagecreatefromjpeg($temp);
								$thumb = 	imagecreatetruecolor($newwidth, $newheight);
											imagecopyresized( $thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height );
											imagejpeg($thumb,$thumb_path);
							break;
							
							case 'image/png':
							
							$img = 		imagecreatefrompng($temp);
								$thumb = 	imagecreatetruecolor($newwidth, $newheight);
											imagecopyresized( $thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height );
											imagepng($thumb,$thumb_path);
							break;
							
							case 'image/gif':
							
							$img = 		imagecreatefromgif($temp);
								$thumb = 	imagecreatetruecolor($newwidth, $newheight);
											imagecopyresized( $thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height );
											imagegif($thumb,$thumb_path);
							break;
						
						
						}
						
						//uploading our file
						
							move_uploaded_file($temp, $path);
							
							
							
							
							
							
							
							
							
							
							
							
							
					
					
					
				}else{
					echo '<p>The image you just uploaded does not meet the requirements. It is bigger than the allowed resolution.</p>';
					
				}
			
					}else{
							echo '<p>The image you just uploaded does not meet the requirements. </p>';			
				}
			}
	
						$sql="INSERT INTO mind_image (image_path, mind, date_uploaded) VALUES ('$thumb_path','$mind','$date')";
						if (!mysqli_query($con,$sql)) {

						die('Error: ' . mysqli_error($con));
					}

								mysqli_close($con);
		
  
  
  
	}elseif($extension == $mp3){
	
							$file_name = "_image_".$mind_id."_".$_FILES['image']['name'];     
							$file_name = preg_replace('/\s+/', '', $file_name);
							$path=	'Via_anon'  . $file_name;
							$temp=  $_FILES['image']['tmp_name'];
							move_uploaded_file($temp, $path);
	
							$sql="INSERT INTO mind_image (audio_path, mind,date_uploaded) VALUES ('$path','$mind','$date')";	

							if (!mysqli_query($con,$sql)) {

							die('Error: ' . mysqli_error($con));
							
							}

mysqli_close($con);

   
}



if($extension == $mp4 or $extension == $MOV){
	
	$file_name = "_image_".$mind_id."_".$_FILES['image']['name'];     
							$file_name = preg_replace('/\s+/', '', $file_name);
							$path=	'Via_anon'  . $file_name;
							$temp=  $_FILES['image']['tmp_name'];
							move_uploaded_file($temp, $path);
	
							$sql="INSERT INTO mind_image (video_path, mind, date_uploaded) VALUES ('$path','$mind','$date')";	

							if (!mysqli_query($con,$sql)) {

							die('Error: ' . mysqli_error($con));
							
							}

	
	
	
	
	
}


mysqli_close($con);
	
											
							
    
      
      

    

  




header("location: ./thank_you.php");


						 



?>
</html>
