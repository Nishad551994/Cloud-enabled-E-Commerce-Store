<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'sabistore') or die('No Database name');

$msg="";
$opr="";
$pid1="";
$cid="";

if(isset($_GET['cid']))	
	$cid=$_GET['cid'];
else
	$cid="NA";
	
if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['pid']))
	$pid1=$_GET['pid'];
	
?>
<html>
<head>
<title>SabiStore-The Ultimate Online Shopping Website</title>
</head>
<body>
<h1>Show Product</h1>
<a href="register2.php?cid=<?php echo $cid;?>">Customer Profile</a>
<form method="post">
<?php
	$sql_sel=mysqli_query($con, "SELECT * FROM product");
	$count=mysqli_num_rows($sql_sel);	
	if($count>0)
	{		
		
		while($row=mysqli_fetch_array($sql_sel))
		{
?>
			
			<table border="1">
				<tr>
					<th colspan="2" align="left"><?php echo $row['pname'];?></th>
				</tr>
				<tr>
					<td colspan="2"><img src="<?php echo $row['pimage'];?>" alt="<?php echo $row['pname'];?>" height="150" width="200" /></td>
				</tr>
				<tr>
					<th align="left">Description :</th>
					<td><?php echo $row['pdesc'];?></td>
				</tr>
				<tr>
					<th align="left">Price :</th>
					<td><?php echo $row['pcost'];?></td>
				</tr>
				<tr>
					<td colspan="2">
					<a href="viewdetails.php?cid=<?php echo $cid;?>&pid=<?php echo $row['pid'];?>" title="View Detail">View Detail</a>
					</td>
				</tr>

			</table>
<?php
		}
	}
	else
	{
		echo "No Product to display.";
	}
?>	
</form>
</div>
</body>
</html>