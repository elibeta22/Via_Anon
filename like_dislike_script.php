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
		
		
		$one = 1;
		$zero =0;
						
	 
	 
	 
	 
	 //In the case someone likes a "mind_image"
	 if(isset($_POST['like'])){


		$like       = $row['likes'];
		$dislike     = $row['dislike'];
		$mind_image_pair_id = $row['mind_image_pair_id'];
	 
				//if mind_image does not exist in table yet 
				if($mind_number != $mind_image_pair_id){
	
						
						$sql="INSERT INTO like_dislike(mind_image_pair_id,likes,dislike) VALUES ('$mind_number','$one','$zero')";

						if (!mysqli_query($con,$sql)) {
 
						die('Error: ' . mysqli_error($con));

						
						}
						
						
						$_SESSION['likes'] = $one;
						$_SESSION['dislikes']=$zero;
						$TotalRatings = $one+$zero;
						
						$LikesCal = $one/$TotalRatings; 
						$LikesPercentage = $LikesCal * 100;
						
						$DislikesCal = $zero/$TotalRatings;
						$DislikesPercentage = $DislikesCal * 100;	
						
						
						$_SESSION['likesPercentage'] = $LikesPercentage;
						$_SESSION['dislikesPercentage'] = $DislikesPercentage;
						echo $one . "|" . $zero;
						
						
						
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

						
							$_SESSION['likes'] = $newlike;
						$_SESSION['dislikes']=$dislike;
						$TotalRatings = $newlike+$dislike;
						
						$LikesCal = $newlike/$TotalRatings; 
						$LikesPercentage = $LikesCal * 100;
						
						$DislikesCal = $dislike/$TotalRatings;
						$DislikesPercentage = $DislikesCal * 100;	
						
						
						
						$_SESSION['likesPercentage'] = $LikesPercentage;
						$_SESSION['dislikesPercentage'] = $DislikesPercentage;
						
						
						
							
	
	
						mysqli_close($con);
	
	
	



	 }
	 
	 
	 }elseif(isset($_POST['dislike'])){
		 
		
	$like2       = $row['likes'];
		$dislike2     = $row['dislike'];
		$mind_image_pair_id2 = $row['mind_image_pair_id'];
	 
	

						if($mind_number != $mind_image_pair_id2){
	
										
						$sql="INSERT INTO like_dislike(mind_image_pair_id,likes,dislike) VALUES ('$mind_number','$zero','$one')";
                        echo $zero . "|" . $one;
						
								if (!mysqli_query($con,$sql)) {
 
											die('Error: ' . mysqli_error($con));

												}
	
													$_SESSION['likes'] = $zero;
													$_SESSION['dislikes']=$one;
						$TotalRatings2 = $zero+$one;
						
						$LikesCal2 = $zero/$TotalRatings2; 
						$LikesPercentage2 = $LikesCal2 * 100;
						
						$DislikesCal2 = $one/$TotalRatings2;
						$DislikesPercentage2 = $DislikesCal2 * 100;	
						
						if($DislikesPercentage2 > 50){
							include('remove_disliked_query.php'); 
						
						
						}else{
						
						$_SESSION['likesPercentage'] = $LikesPercentage2;
						
						$_SESSION['dislikesPercentage'] = $DislikesPercentage2;
						
						}
						
													mysqli_close($con);


					

							
							}elseif($mind_number == $mind_image_pair_id2){

	
							



							$newdislike = $dislike2 + 1;	
							echo $like2 . "|" . $newdislike;
	
							$sql="UPDATE like_dislike SET dislike = $newdislike WHERE mind_image_pair_id = $mind_number";





								if (!mysqli_query($con,$sql)) {
 
											die('Error: ' . mysqli_error($con));

									}
											
											$_SESSION['likes'] = $like2;
											$_SESSION['dislikes']=$newdislike;
						$TotalRatings2 = $like2+$newdislike;
						
						$LikesCal2 = $like2/$TotalRatings2; 
						$LikesPercentage2 = $LikesCal2 * 100;
						
						$DislikesCal2 = $newdislike/$TotalRatings2;
						$DislikesPercentage2 = $DislikesCal2 * 100;	
						
					if($DislikesPercentage2 > 50){
							include('remove_disliked_query.php'); 
						
						
						}else{
						
						$_SESSION['likesPercentage'] = $LikesPercentage2;
						
						$_SESSION['dislikesPercentage'] = $DislikesPercentage2;
						
						}
							header("Location: return_story.php");
					
						
	
	
												mysqli_close($con);
	
	
	
}



	 }













  




						
header("location: ./return_story2.php");















?>