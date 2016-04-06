<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 250px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	
	.box1{
		
		background-color:white;
	}
	
	.bc{
		 background-color:silver;
		
	}
	
	.box1padding{
		padding-top:2%;
		
	}
	
	
  .container_height{
	  height:300px;
	
}
.btn-primary{
	color:#8B0000;
	background-color:white;
	
	
	
}
btn-group:hover{
	color:red;
	
}

  </style>
</head>
<body class="bc">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><div><?php session_start(); echo $_SESSION['username'];  ?></div></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="mainpage.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Via Anon</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center box1padding"">    
  <div class="row content box1">
    <div class="col-sm-2 sidenav bc">
   
   
    </div>
    <div class="col-sm-8 text-left"> 
      <h1><u>Strings Attached</u></h1>
      <br/>
	  
	  <div class="btn-group btn-group-justified">
  <a href="#" class="btn btn-primary btn btn-danger">Stories</a>
  <a href="#" class="btn btn-primary btn btn-danger">Followers</a>
  <a href="#" class="btn btn-primary btn btn-danger">Messages</a>
</div>

<br/><br/>

<div class="btn-group btn-group-justified">
  <a href="#" class="btn btn-primary btn btn-danger">Upload Story</a>
  <a href="#" class="btn btn-primary btn btn-danger">Find a Friend</a>
  <a href="#" class="btn btn-primary btn btn-danger">Explore Stories</a>
</div>
	  
	  
	  
	  
	  
    </div>
    <div class="col-sm-2 sidenav bc">
      
     
  </div>
</div>
</div>
</br>
<div class="container-fluid text-center box1padding"">
 <div class="row content box1">
<div class="col-sm-2 sidenav bc">
      
	  
	  
	  
	  
    </div>
	 
    <div class="col-sm-8 text-left"> 
      <h1><u>No Strings Attached</u></h1>
<br/>
<br/>      
<div class="btn-group btn-group-justified">
  <a href="Via_anon.php" class="btn btn-primary btn btn-danger">Upload Anon Story</a>
  <a href="return_story.php" class="btn btn-primary btn btn-danger">Explore Anon Stories</a>
  
</div>
	  
	  
	  
	  
	  
    </div>
    <div class="col-sm-2 sidenav bc">
      
	  
	  
    </div>
	</div>
 </div>


</body>
</html>
