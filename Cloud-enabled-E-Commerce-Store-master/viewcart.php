<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'sabistore') or die('No Database name');

$msg="";
$opr="";
$pid="";
$cid1="";
$cartid="";
$cartid1="";
$total=0;

if(isset($_GET['cid']))	
	$cid1=$_GET['cid'];
else
	$cid1="NA";

if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['cartid']))
	$cartid1=$_GET['cartid'];
	
if(isset($_GET['pid']))
	$pid=$_GET['pid'];

if($opr=="del")
{
	$del_sql=mysqli_query($con, "DELETE FROM cart WHERE cartid='$cartid1' and cid='$cid1'");
	//$del_sql=mysqli_query($con ,"DELETE FROM frames WHERE odid='$odid'");
	if($del_sql)
		$msg="1 Record Deleted...!";
	else
		$msg="Could not Delete :".mysqli_error();		
}

if($opr=="empty")
{
	$del_sql=mysqli_query($con, "DELETE FROM cart WHERE cid='$cid1'");
	if($del_sql)
		$msg="Cart Empty";
	else
		$msg="Could not Delete :".mysqli_error();		
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SabiStore-The Ultimate Online Shopping Website</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>SabiStore</strong>&nbsp;<sub><font size='3'>The Ultimate Online Shop</font></sub></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                  
					<?php
						if ($cid1!="NA")
						{
							$sql_cart=mysqli_query($con, "SELECT count(*) FROM cart WHERE cid='$cid1'");						
							$row_cart=mysqli_fetch_array($sql_cart);
							$cartcount=$row_cart[0];
							
							echo "<li><a href='viewcart.php?cid=$cid1'>Cart<sup>$cartcount</sup></a></li>";
							echo "<li><a href='customer_profile.php?cid=$cid1'>Dashboard</a></li>";
							echo "<li><a href='logout.php?cid=$cid1'>Logout</a></li>";
						}
					?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+91-9768626899</a></li>
                            <li><a href="#"><strong>Mail: </strong>sabinaik10@gmail.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div> Shristi<br />
                                    Mira Road<br />
                                    INDIA
								</div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
        
		</div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Electronics
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">Mobile
							<span class="label label-primary pull-right">234</span>
                        </li>
                        <li class="list-group-item">Computers
							<span class="label label-success pull-right">34</span>
                        </li>
                        <li class="list-group-item">Tablets
                         <span class="label label-danger pull-right">4</span>
                        </li>
                        <li class="list-group-item">Appliances
                             <span class="label label-info pull-right">434</span>
                        </li>
                        <li class="list-group-item">Games & Entertainment
                             <span class="label label-success pull-right">34</span>
                        </li>
                    </ul>
                </div>
                <!-- /.div -->
                <div>
                    <a href="#" class="list-group-item active list-group-item-success">Clothing & Wears
                    </a>
                    <ul class="list-group">

                        <li class="list-group-item">Men's Clothing
                             <span class="label label-danger pull-right">300</span>
                        </li>
                        <li class="list-group-item">Women's Clothing
                             <span class="label label-success pull-right">340</span>
                        </li>
                        <li class="list-group-item">Kid's Wear
                             <span class="label label-info pull-right">735</span>
                        </li>

                    </ul>
                </div>
                <!-- /.div -->
                <div>
                    <a href="#" class="list-group-item active">Accessaries & Extras
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">Mobile Accessaries
                             <span class="label label-warning pull-right">456</span>
                        </li>
                        <li class="list-group-item">Men's Accessaries
                             <span class="label label-success pull-right">156</span>
                        </li>
                        <li class="list-group-item">Women's Accessaries
                             <span class="label label-info pull-right">400</span>
                        </li>
                        <li class="list-group-item">Kid's Accessaries
                             <span class="label label-primary pull-right">89</span>
                        </li>
                        <li class="list-group-item">Home Products
                             <span class="label label-danger pull-right">90</span>
                        </li>
                        <li class="list-group-item">Kitchen Products
                             <span class="label label-warning pull-right">567</span>
                        </li>
                    </ul>
                </div>
                <!-- /.div -->
                
                <!-- /.div -->
                <div class="well well-lg offer-box offer-colors">
                    <span class="glyphicon glyphicon-star-empty"></span>25 % off  , GRAB IT                 
              
                   <br />
                    <br />
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                            style="width: 70%">
                            <span class="sr-only">70% Complete (success)</span>
                            2hr 35 mins left
                        </div>
                    </div>
                    <a href="#">click here to know more </a>
                </div>
                <!-- /.div -->
            </div>
            <!-- /.col -->
			<!--Main content Elements-->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">                       
                        <li><h2>Cart</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                <!--Main content Elements-->
			<?php
			if ($cid1=="NA")
			{
				header("location: index.php");
			}
			else
			{
			if($cid1!="NA")
			{

			}
			?>
			<form method="post">
			<?php
			$sql_sel=mysqli_query($con, "SELECT * FROM cart where cid='$cid1'");
			$count=mysqli_num_rows($sql_sel);	
			if($count>0)
			{					
			?><br>
			<table border="1"  width="75%" align="center" cellpadding="4" cellspacing="0">
				<tr>					
					<td align="center"><b>Cart Id</b></td>
					<td align="center"><b>Product Name</b></td>					
					<td align="center"><b>Price</b></td>
					<td align="center"><b>Quanity</b></td>
					<td align="center"><b>Amount</b></td>
					<td align="center"><b>Delete</b></td>										
				</tr>
			<?php
				while($row=mysqli_fetch_array($sql_sel))
				{
			?>
				<tr>
					<td align="center"><?php echo $row['cartid'];?></td>		
					<td align="center"><?php
						$sql_sel1=mysqli_query($con, "SELECT pname FROM products where pid='$row[2]'");
						while($row1=mysqli_fetch_array($sql_sel1))
							echo $row1['pname'];
						?>
					</td>
					<td align="center"><?php
						$sql_sel2=mysqli_query($con, "SELECT pprice FROM products where pid='$row[2]'");
						while($row2=mysqli_fetch_array($sql_sel2))
						{	
							echo $row2['pprice'];
							//$total=$total+$row2['pprice'];
						}
						?>
					</td>
					<td align="center"><?php echo $row['oqty'];?></td>
					<td align="center"><?php
						$sql_sel3=mysqli_query($con, "SELECT pprice FROM products where pid='$row[2]'");
						while($row3=mysqli_fetch_array($sql_sel3))
						{	
							$amt=$row3['pprice']* $row['oqty'];
							echo $amt;
							$total=$total+$amt;
						}
						?>
					</td>
					<td align="center"><a href="viewcart.php?cid=<?php echo $cid1;?>&opr=del&cartid=<?php echo $row['cartid'];?>" title="Delete"><img src="picture/delete.png" /></a></td>
				</tr>
			<?php
				}
			?>
			<!--<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>---------------</td>
				<td>&nbsp;</td>
			</tr>-->
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><b>Total</b></td>
				<td><b><?php echo $total;?></b></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center" colspan="6"><br><a href="viewcart.php?cid=<?php echo $cid1;?>&opr=empty"  class="btn btn-success" role="button">Empty Cart</a>&nbsp;
				<a href="confrimpurchase.php?cid=<?php echo $cid1;?>"  class="btn btn-success" role="button">Confirm Purchase</a></td>		
			</tr>
			<?php
			}
			else
			{
				$msg="No Items in Cart";
			}
			}
			?>					
			</table><br>	
			</form>

			<h2 style="color:#00F;" align="center">
				<?php echo $msg; ?>
			</h2>			
		</div>
            <!-- /.col -->
		</div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
	<!--
    
	-->
    <div class="col-md-12 end-box ">
        &copy; 2017-18 | &nbsp; All Rights Reserved | &nbsp; 24x7 support | &nbsp; Email us: sabinaik10@gmail.com
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>
