<!DOCTYPE html>
<html>
<head>
<TITLE>dCloud.ml | Download</TITLE>
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">dCLOUD</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php" target="_bank">Home</a></li>
      <li><a href="upload.php" target="_bank">Upload</a></li>
      <li class="active"><a href="download.php" target="_bank">Download</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  <form action="" enctype="multipart/form-data" method="POST">
    <div class="form-group">
      <label for="file">File ID :</label>
      <input type="text" class="form-control" id="file" placeholder="Enter your file id" name="file_id">
    </div>
    <input type="submit" name="submit" value="Download My File" class="btn btn-primary btn-block">
  </form>
<br>

<?php
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
		$file_id = $_POST['file_id'];
		$sql = "SELECT * FROM file_upload WHERE file_id='$file_id'";
		$result = mysqli_query($connection, $sql);
		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
        $newfilename=$row["newfilename"];
        $size=$row["size"];
        $date=$row["date"];
        $name=$row["name"];
		}
		} else {
		echo "0 results";
		}

		echo "<div class='panel panel-success'>
		<div class='panel-heading'><center><b>SUCCESS</b></center></div>
		<div class='panel-body'><center>Your file is available <br>The download link is <a href='http://www.dcloud.ml/uploads/$newfilename' target='_blank'>Here</a></center>
		<br>
		<center>Your File ID : <b>$file_id</center>
		<br>
		<center>Your File Name : <b>$name</center>
		<br>
		<center>Your File Size : <b>$size</center>
		<br>
		<center>Your File Date : <b>$date</center>
		</div>
		</div>";
}
		else
		{
		echo "<center>if failed to return file, <br>Contact admin @ dcloud.ml +91 8778697644</center>";
		}
?>
<br>
<footer class="fixed-bottom">
<p align="right"><img src="ssl_certification.png" class="img-responsive" alt="SSL Secuirty" title="Secured"/></p>
</footer>
</body>
</html>