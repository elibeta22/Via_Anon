<?php
session_start();
		
		
		//"mind_image" is the uploaded information that the user uploaded
		
		//acquiring mind_image_pair_id   
		$_SESSION['id'] = $_POST['mind_id'];
		$mind_number = $_SESSION['id'];

        //connecting to database
		$con=mysqli_connect("localhost","root","","via_anon");
		
		//acquiring data from "like_dislike" table  
		$like_dislike_info = "select Like_Dislike_id,mind_image_pair_id,likes,dislike from like_dislike where mind_image_pair_id=$mind_number";
		$strSQL_Result  = mysqli_query($con,$like_dislike_info);
		
		//acquiring important data attributes from like_dislike table
		$row     = mysqli_fetch_assoc($strSQL_Result);
		
		$like       = $row['likes'];
		$dislike     = $row['dislike'];
		$mind_image_pair_id = $row['mind_image_pair_id'];

		$one = 1;
		$zero =0;
						
	 
	 
	 
	 
	 //In the case someone likes a "mind_image"
	 if($_POST['like']){
	
				//if mind_image does not exist in table yet 
				if($mind_number != $mind_image_pair_id){
	
						
						$sql="INSERT INTO like_dislike(mind_image_pair_id,likes,dislike) VALUES ('$mind_number','$one','$zero')";

						if (!mysqli_query($con,$sql)) {
 
						die('Error: ' . mysqli_error($con));

						
						}
						
						$_SESSION['likes'] = $like;
						$_SESSION['dislikes']=$dislike;
						$TotalRatings = $like+$dislike;
						
						$LikesCal = $like/$TotalRatings; 
						$LikesPercentage = $LikesCal * 100;
						
						$DislikesCal = $dislike/$TotalRatings;
						$DislikesPercentage = $DislikesCal * 100;	
						
						
						$_SESSION['likesPercentage'] = $LikesPercentage;
						$_SESSION['dislikesPercentage'] = $DislikesPercentage;
						
						
						
						
						mysqli_close($con);
						
						
                        
	
				}elseif($mind_number == $mind_image_pair_id){

					//if a mind_image entity exist in table
						echo '<p>i like it alot</p>';
						$newlike = $like + 1;
						
						echo $newlike . "|" . $dislike;
	
						$sql="UPDATE like_dislike SET likes = $newlike WHERE mind_image_pair_id = $mind_number";

						
					
						

						
						if (!mysqli_query($con,$sql)) {
 
						die('Error: ' . mysqli_error($con));

						}

						
							$_SESSION['likes'] = $like;
						$_SESSION['dislikes']=$dislike;
						$TotalRatings = $like+$dislike;
						
						$LikesCal = $like/$TotalRatings; 
						$LikesPercentage = $LikesCal * 100;
						
						$DislikesCal = $dislike/$TotalRatings;
						$DislikesPercentage = $DislikesCal * 100;	
						
						
						$_SESSION['likesPercentage'] = $LikesPercentage;
						$_SESSION['dislikesPercentage'] = $DislikesPercentage;
						
						
						
							
	
	
						mysqli_close($con);
	
	
	



	 }
	 
	 
	 }else{
		 
		
	
	

						if($mind_number != $mind_image_pair_id){
	
										
						$sql="INSERT INTO like_dislike(mind_image_pair_id,likes,dislike) VALUES ('$mind_number','$zero','$one')";

								if (!mysqli_query($con,$sql)) {
 
											die('Error: ' . mysqli_error($con));

												}
	
													$_SESSION['likes'] = $like;
													$_SESSION['dislikes']=$dislike;
						$TotalRatings = $like+$dislike;
						
						$LikesCal = $like/$TotalRatings; 
						$LikesPercentage = $LikesCal * 100;
						
						$DislikesCal = $dislike/$TotalRatings;
						$DislikesPercentage = $DislikesCal * 100;	
						
						
						$_SESSION['likesPercentage'] = $LikesPercentage;
						$_SESSION['dislikesPercentage'] = $$DislikesPercentage;
						
						
													mysqli_close($con);


					

							
							}elseif($mind_number == $mind_image_pair_id){

	
							



							$newdislike = $dislike + 1;	
							echo $like . "|" . $newdislike;
	
							$sql="UPDATE like_dislike SET dislike = $newdislike WHERE mind_image_pair_id = $mind_number";





								if (!mysqli_query($con,$sql)) {
 
											die('Error: ' . mysqli_error($con));

									}
											
											$_SESSION['likes'] = $like;
											$_SESSION['dislikes']=$dislike;
						$TotalRatings = $like+$dislike;
						
						$LikesCal = $like/$TotalRatings; 
						$LikesPercentage = $LikesCal * 100;
						
						$DislikesCal = $dislike/$TotalRatings;
						$DislikesPercentage = $DislikesCal * 100;	
						
						
						$_SESSION['likesPercentage'] = $LikesPercentage;
						$_SESSION['dislikesPercentage'] = $DislikesPercentage;
						
						
	
	
												mysqli_close($con);
	
	
	
}



	 }













  




						
header("location: ./return_story.php");















?>