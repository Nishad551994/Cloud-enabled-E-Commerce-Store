<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'sabistore') or die('No Database name');

$msg="";
$opr="";
$pid="";
$cid1="";
$count="";
$cartid="";
$oid="";
$odid="";
$total="";
$bid="";
$today=date("d/m/Y");

//confrim
if(isset($_GET['cid']))	
	$cid1=$_GET['cid'];
else
	$cid1="NA";
echo "Cid=",$cid1,"<br>";
	
if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['pid']))
	$pid=$_GET['pid'];

if ($cid1=="NA")
{
	//echo "javascript:alert('please login to buy product');";
	header("location: index.php");
}
else
{
	$sql_sel=mysqli_query($con, "SELECT * FROM cart where cid='$cid1'");
	$count=mysqli_num_rows($sql_sel);
	echo "Cart count=",$count,"<br>";
	if($count>0)
	{
		//generating order
		$sql=mysqli_query($con, "select max(cast(right(oid,length(oid)-1) as signed)) from orders");
		$row=mysqli_fetch_row($sql);
		$oid='O'.($row[0]+1);

		$sql_ins=mysqli_query($con, "INSERT INTO orders VALUES('$oid','$cid1','$today')");

		if($sql_ins==true)
		{
			$msg=$msg."1 orders row inserted<br/>";
		}
		else
		{	
			$msg=$msg."O Insert Error:".mysqli_error()."<br/>";		
		}
		
		//generating order_detail
		while($row=mysqli_fetch_array($sql_sel))
		{
			$sql=mysqli_query($con, "select max(cast(right(odid,length(odid)-2) as signed)) from order_details");
			$row1=mysqli_fetch_row($sql);
			$odid='OD'.($row1[0]+1);

			$sql_ins=mysqli_query($con, "INSERT INTO order_details VALUES('$odid','$oid','$row[2]','$row[3]')");
			
			if($sql_ins==true)
			{
				$msg=$msg."1 order_detail row inserted<br/>";
			}
			else
			{	
				$msg=$msg."OD Insert Error:".mysqli_error()."<br/>";		
			}
		}
		
		//empty cart
		$del_sql=mysqli_query($con,"DELETE FROM cart WHERE cid='$cid1'");
		if($del_sql)
			$msg=$msg."Cart Empty<br/>";
		else
			$msg=$msg."Could not Delete :".mysqli_error()."<br/>";

		//calculating bill
		$sql_sel2=mysqli_query($con, "SELECT * FROM order_details where oid='$oid'");
		$count=mysqli_num_rows($sql_sel2);	
		if($count>0)
		{
			while($row2=mysqli_fetch_array($sql_sel2))
			{
				$sql_sel3=mysqli_query($con, "SELECT pprice FROM products where pid='$row2[2]'");
				while($row3=mysqli_fetch_array($sql_sel3))
				{	
					echo "Oty ",$row2[3]," x Pprice ",$row3['pprice'],"=";
					$amt=$row3['pprice']*$row2[3];					
					echo $amt,"<br/>";
					$vat=$amt*0.12;
					$total=$total+$vat+$amt;
				}
			}

			//generating bill

			$sql=mysqli_query($con, "select max(cast(right(bid,length(bid)-1) as signed)) from bill");
			$row4=mysqli_fetch_row($sql);
			$bid='B'.($row4[0]+1);
	
			$sql_ins=mysqli_query($con, "INSERT INTO bill VALUES('$bid','$today','$oid','$total')");
			
			if($sql_ins==true)
			{
				$msg=$msg."1 bill row inserted<br/>";
			}
			else
			{	
				$msg=$msg."B Insert Error:".mysqli_error()."<br/>";		
			}
			
			//level update
			$sql_lvl=mysqli_query($con, "select * from level where cid='$cid1'");
			$rowlvl=mysqli_fetch_row($sql_lvl);
			$lvlid=$rowlvl[0];
			
			$sql_lvl_upd=mysqli_query($con, "update level set cid='$cid1',lvl=3 where lvlid='$lvlid'");
			//echo "update level set cid='$cid1',lvl=3 where lvlid='$lvlid'";
			
			if($sql_lvl_upd==true)
			{
				$msg=$msg."level 1 updated";
			}
			
			header("location: billreport.php?cid=$cid1&oid=$oid");
		}
	}
	else
	{
		$msg=$msg."No Items in Cart";
	}
}
echo $msg,"<br/>";
?>