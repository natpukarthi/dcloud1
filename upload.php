<!DOCTYPE html>
<html>
<head>
<TITLE>dCloud.ml | Upload</TITLE>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="author" CONTENT="NatpuKarthi">
<META NAME="subject" CONTENT="Business">
<META NAME="Description" CONTENT="Web Designing Company">
<META NAME="Classification" CONTENT="The simple web designing company located in Salem, India. Enhancing small business.">
<META NAME="Keywords" CONTENT="2d technologies, 2dtechnologies, salem,web designing, web designing company in salem, software designing, natpukarthi">
<META NAME="Geography" CONTENT="ATTAYAMPATTY, SALEM">
<META NAME="Language" CONTENT="ENGLISH">
<META NAME="Copyright" CONTENT="2D Technologies">
<META NAME="Designer" CONTENT="NatpuKarthi">
<META NAME="Publisher" CONTENT="2D Technologies">
<META NAME="distribution" CONTENT="Global">
<META NAME="zipcode" CONTENT="637501">
<META NAME="city" CONTENT="Salem">
<META NAME="country" CONTENT="India">
<link rel="icon" href="image/logo.png" type="image/png" sizes="48x48">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="https://jquery.js"></script>
<script src="https://bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">dCLOUD</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php" target="_bank">Home</a></li>
      <li class="active"><a href="upload.php" target="_bank">Upload</a></li>
      <li><a href="download.php" target="_bank">Download</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  <form action="" enctype="multipart/form-data" method="POST">
    <div class="form-group">
      <label for="file">Choose File :</label>
      <input type="file" class="form-control" id="file" placeholder="Choose File" name="file">
    </div>
    <input type="submit" name="submit" value="Upload My File" class="btn btn-primary btn-block">
  </form>
<br>
<?php
date_default_timezone_set('Asia/Calcutta'); 
function get_mb($size) {
    return sprintf("%4.4f MB", $size/1048576);
}
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'test');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
if(isset($_POST['submit']))
{
		$name = $_FILES['file']['name'];
		$size = get_mb($_FILES['file']['size']);
		$type = $_FILES['file']['type'];
		$date = date("F j, Y, H:i a");
		$browser = 'FireFox';
		$ip = '127.0.0.1';
		$tmp_name = $_FILES['file']['tmp_name'];
		$location = "uploads/";
		$file_id=rand(1,99999);
		$extension=end(explode(".",$_FILES["file"]["name"]));
		$newfilename = $file_id . '.' . end(explode(".",$_FILES["file"]["name"]));
		if(move_uploaded_file($tmp_name, $location.$newfilename)){
		$sql = "INSERT INTO file_upload (name, file_id, newfilename, size, type, date, ip, browser, downloads) VALUES ('$name', '$file_id', '$newfilename', '$size', '$type', '$date', '$ip', '$browser', '0')";
		if ($connection->query($sql) === TRUE)
		{
		echo "<div class='panel panel-success'>
      <div class='panel-heading'><center><b>SUCCESS</b></center></div>
      <div class='panel-body'><center>Your file was successfully uploaded!<br>The download link is <a href='http://www.dcloud.ml/uploads/$newfilename' target='_blank'>Here</a></center>
	  <br><center>Your File ID is : <b>$file_id</b></center></div>
	  <br><center>file stored in database successfully</center></div>";
		} else {
		echo "Error: " . $sql . "<br>" . $connection->error;
		}
}
		else
		{
		echo "<center>Failed to Upload File!</center>";
		}
}
else
	{
		echo "<center>Select a file to be uploaded!</center>";
	}
?>
<br>
<footer class="fixed-bottom">
<p align="right"><img src="ssl_certification.png" class="img-responsive" alt="SSL Secuirty" title="Secured"/></p>
</footer>
</body>
</html>