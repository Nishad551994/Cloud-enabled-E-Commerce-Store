<?php
	$con = mysqli_connect('localhost','root','') or die('No Connection');
	mysqli_select_db($con, 'sabistore') or die('No Database name');
	session_start();
	$cid=$_REQUEST['cid'];
	
	$sql_update=mysqli_query($con, "UPDATE customer set login='no' where cid='$cid'");
	
	if($sql_update==true)
	{
		
		echo "Logging out user";
		session_unset();
		session_destroy();
		header("location: index.php");
	}
?>