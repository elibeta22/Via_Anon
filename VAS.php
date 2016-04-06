<html>
<head>
<h1 class="heading">Via Anon </h1>
<title>Rob's version</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel="stylesheet" href="Via_Anon.css">
</head>


<?PHP

$con=mysqli_connect("localhost","root","","via_anon");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql_get_next_id = 'SELECT auto_increment FROM information_schema.TABLES WHERE TABLE_SCHEMA = "via_anon" AND TABLE_NAME = "mind_image"';

$mind = mysqli_real_escape_string($con, $_POST['mind']);
//$image = mysqli_real_escape_string($con, $_POST['images']);
$ini_array = parse_ini_file("via_anon.ini");

error_log("path from ini file: ".$ini_array['path']);

  if (is_uploaded_file($_FILES['images']['tmp_name']) && $_FILES['images']['error']==0) {
     
      // Query to get the next id for rob_mind_image_pair and use that at part of the filename.
      // We use the id to make sure the filenames for every file unique. 
      $result = mysqli_query($con,$sql_get_next_id);
      mysqli_data_seek($result,0);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      $mind_id = $row["auto_increment"];
    
      // anon_1_image.jpg 
      $file_name = "anon_".$mind_id."_".$_FILES['images']['name'];      

      // remove white spaces from file name
      $file_name = preg_replace('/\s+/', '', $file_name);

      error_log('$file_name:  '.$file_name);

      // /via_anon/upload/images/anon_1_image.jpg
      $file_absolute_path = $ini_array['path'].$file_name;
      error_log('$file_absolute_path: '.$file_absolute_path);

    if (!file_exists($file_absolute_path)) {
      if (move_uploaded_file($_FILES['images']['tmp_name'], $file_absolute_path)) {
        echo "The file was uploaded successfully.";
      } else {
        echo "The file was not uploaded successfully.";
      }
    } else {
      echo "File already exists. Please upload another file.";
    }
  } else {
    echo "The file was not uploaded successfully.";
    echo "(Error Code:" . $_FILES['images']['error'] . ")";
  }

// insert new mind into database







if($extension = substr(strrchr($file_name, "."), 1)){
$mp3 = "mp3";
error_log("path info=> $mp3\r\n",3,"error_log.php");
   if($extension == $mp3){
$sql="INSERT INTO mind_image (audio_path, mind) 
VALUES ('$file_name','$mind')";
}else{
$sql="INSERT INTO mind_image (image_path, mind)
VALUES ('$file_name','$mind')";
}
}else{
echo "You must at enter sufficient data, sorry for the inconvienence.";
header("Location: Via_anon.php");
}
error_log('$sql: '.$sql);
if (!mysqli_query($con,$sql)) {

   die('Error: ' . mysqli_error($con));
}

mysqli_close($con);

header("location: ./thank_you.php");

?>
</html>
