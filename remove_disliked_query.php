<?php
//acquiring mind_image_pair_id   
		$_SESSION['id'] = $_POST['mind_id'];
		$mind_number = $_SESSION['id'];

        //connecting to database
		$con=mysqli_connect("localhost","root","","via_anon");
		
		//acquiring data to delete query that has been disliked.
		$deletion= "DELETE FROM `via_anon`.`mind_image` WHERE `mind_image`.`id` = $mind_number";

		$strSQL_Result2  = mysqli_query($con,$deletion);
		
		//acquiring important data attributes from like_dislike table
				
											
unset($_SESSION['id']); 
											mysqli_close($con);
												
	





?>