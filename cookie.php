<?php
	$cname="testpg1";
	$cvalue="SEM 1";
	setcookie($cname,$cvalue,time()+(86400*1),"/");
?>

<?php
	if(isset($_COOKIE['testpg1']))
	{
		echo $_COOKIE['testpg1'];
	}
	else
	{
		echo "Not set!";
	}
?>
