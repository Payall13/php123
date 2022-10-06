<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container mt-5">
	<center><b><h1>LOGIN HERE</h1></b></center>
<form action="loginpage.php" method="POST">
	<input type="email" name="txtmail" class="form-control" placeholder="enter mail" required></br>
	<input type="password" name="txtpwd" class="form-control" placeholder="enter password" required></br>
	<center> <input type="submit" value="LOGIN" class="btn btn-success width-100">
</form>
</div>
<?php
	if(isset($_POST['txtmail']))
	{
			$email=$_POST['txtmail'];
			$password=$_POST['txtpwd'];
			$sql="SELECT*FROM`usr`where `mail`='$email'`pwd`='password'";
			$res=mysqli_query($con,$sql);
			header("location:homepage.php");
	}
?>
