<title>Sabi Store</title>

<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'sabistore') or die('No Database name');

$msg="";
$cid1="";
$oid="";
$i=0;
$vat=0;
$gt=0;
$amt=0;

//confrim
if(isset($_GET['cid']))	
	$cid1=$_GET['cid'];
else
	$cid1="NA";

if(isset($_GET['oid']))	
	$oid=$_GET['oid'];
	
?>
<a href="customer_profile.php?cid=<?php echo $cid1;?>">Back to Profile</a><br/>
<a href="javascript:window.print()">Print</a>
<?php
if ($cid1=="NA")
{
	header("location: index.php");
}
else
{
	$sql_sel=mysqli_query($con, "select c.*,o.*,b.* from customer c, orders o,bill b where c.cid=o.cid and o.oid=b.oid and o.cid='$cid1' and o.oid='$oid'");
	$count=mysqli_num_rows($sql_sel);	
	
	if($count>0)
	{
		echo "<table border='1' align='center'>";
		echo "<tr><td colspan='5' align='center'><font size='10'><strong>SabiStore</strong></font>&nbsp;<sub><font size='3'>The Ultimate Online Shop</font></sub></font><hr>Samta Sadan, Mira Bhayandar Road, Mira Road East, Near Veggies Restaurants, Silver Park, Mira Bhayandar, Maharashtra 401107<br>
						Phone No.-28974546.
						Mobile No.-9892345546</td></tr>";
		echo "<tr><td colspan='5' align='center'><font size='6'>Bill</font></td></tr>";
		while($row=mysqli_fetch_array($sql_sel))
		{
			echo "<tr><td align='right' colspan='5'>Date : ", $row[13] ,"</td></tr>";
			echo "<tr><td colspan='5'>Customer name : ", $row[1] ,"</td></tr>";
			echo "<tr><td colspan='5'>Address : ", $row[2] ,"</td></tr>";
			echo "<tr><td colspan='5'>Contact No : ", $row[3] ,"</td></tr>";
			echo "<tr><td colspan='5' align='center'><font size='5'>Product Details</font></td></tr>";
			$sql_sel1=mysqli_query($con, "select od.*,p.* from customer c, orders o,order_details od, products p,bill b where c.cid=o.cid and o.oid=od.oid and p.pid=od.pid and o.oid=b.oid and o.cid='$cid1' and o.oid='$oid'");
			echo "<tr><td>No.</td><td>Product name</td><td align='right'>Price</td><td  align='right'>Order Quantity</td><td>Amount</td></tr>";
			while($row1=mysqli_fetch_array($sql_sel1))
			{
				echo "<tr><td>",++$i,"</td><td>",$row1[5],"</td><td align='right'>",$row1[8],"</td><td align='right'>",$row1[3],"</td><td align='right'>",$row1[8]*$row1[3],"</td></tr>";
				$amt=$amt+($row1[8]*$row1[3]);
			}			
			$vat=$amt*0.12;			
			$gt=$amt+$vat;
			echo "<tr><td></td><td></td><td></td><td  align='right'>GST 12% </td><td align='right'>",$vat,"</td></tr>";
			echo "<tr><td></td><td></td><td></td><td  align='right'>Grand Total </td><td align='right'>",$gt,"</td></tr>";
		}
		echo "</table>";
	}
	else
	{
		$msg=$msg."No Bill";
	}
}
echo $msg,"<br/>"?>