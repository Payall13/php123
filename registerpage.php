<?php
	$con = mysqli_connect("localhost","root","","payal");
	if(isset($_POST['txtnm']))
	{
		if($con)
		{
			$name=$_POST['txtnm'];
			$email=$_POST['txtmail'];
			$contact=$_POST['txtcont'];
			$password=$_POST['txtpwd'];
			$sql="INSERT INTO `usr`(`name`, `email`, `contact`, `password`) VALUES ('$name','$email','$contact','$password')";
			$res=mysqli_query($con,$sql);
			header("location:loginpage.php");
		}
	}
?>
<html>
	<head>
	<title>REGISTRATION PAGE</title></center>
	<center><h1>REGISTER HERE</h1>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container=mt-5">
	
	<form action="registerpage.php" method="POST">
	
	<input type="txt" name="txtnm" class="form-control" placeholder="enter name" required></br></br>
	<input type="txt" name="txtmail" class="form-control" placeholder="enter email" required></br></br>
	<input type="txt" name="txtcont" class="form-control" placeholder="enter contact"required></br></br>
	<input type="txt" name="txtpwd" class="form-control" placeholder="enter password" required></br></br>
	<input type="submit" class="btn btn-primary width-100" value="register "></br>
	</form>
	</div>
	</body>
</html>
