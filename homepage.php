<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap.min.css"/>
<?php
	
	session_start();
	if($_SESSION['usr'])
	{

		header("location:loginpage.php");
	}
	$con=mysqli_connect("localhost","root","","payal");
	if(!$con)
	{
		echo "error";
	}
	else
	{
		$mail1=$_SESSION['usr'];
		$sql="select* from `usr` where email='$mail1'";
		$res=mysqli_query($con,$sql); 
	}
?>

<div class="container-fluid mt-5 text-center">
	
	<?php
			$count =mysqli_affected_rows($con);
			if($count ==1)
			{
			
				$row= mysqli_fetch_assoc($res);
			}
	?>

<form action="homepage.php" method="POST" enctype="multipart/form-data">
		<?php
		
			if($row['profilepic']=="")
			{
		?>
<img class="img-circle" src="<?php echo "images/".$row['profilepic']; ?>" alt="No Image" height="100" width="100" name="usrimg" id="usrimg"></br>
	
	
	<?php
			}
			
			if($row['profilepic']=="")
			{
	?> 
<img class="https://png.pngtree.com/png-vector/20191119/ourmid/pngtree-beautiful-profile-glyph-vector-icon-png-image_2002807.jpg"/>
alt="no image" height="100" width="100" name="usrimg" id="userimg"></br>
		<input type="file" class="form-control" id="fileupload" name="fileupload" accept=".JPEG,.JPG,.PNG">
		<?php
			}
		?>

<input type="text" value="<?php echo $row['name'];?>" name="txtnm" class="form-control" required></br>
	<input type="email" value="<?php echo $row['email'];?>" name="txtmail" class="form-control" disabled></br>
	<input type="text" value="<?php echo $row['contact'];?>" name="txtcont" class="form-control" required></br>
	<input type="password" value="<?php echo $row['password'];?>" name="txtpwd" class="form-control" required></br>
	<input type="submit" value="Save Changes" class="btn btn-success w-100">
	</form>
</div>
<?php
if(isset($_POST['txtnm']))
	{
		$name=$_POST['txtnm'];
		$contact=$_POST['txtcont'];
		$password=$_POST['txtpwd'];
		$target_dir = "images/";
		$temp = explode(".", $_FILES["fileupload"]["name"]);
		$profilepic = round(microtime(true)) . '.' . end($temp);
		echo $profilepic;
		if(move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_dir.$profilepic))
		{
			$sql = "update `usr` set name='$nm',contact='$cont',password='$pwd',profilepic='$profilepic' where email='$mail'";
		}
		else
		{
			$sql = "update `usr` set name='$nm', contact='$cont',password'$pwd' where email='$mail1'";
		}
		if(mysqli_query($con,$sql))
		{
			header("location:homepage.php");
		}
	}
?>
<script>
	fileupload.onchange = evt => {
  const [file] = fileupload.files
  if (file) {
    usrimg.src = URL.createObjectURL(file)
  }
}
</script>
