<?php
	//session_start();	
	$con = mysqli_connect("localhost","root","") or die("No Connection");
	mysqli_select_db($con, 'sabistore') or die("No Database name");
	
	$aid="";
	$cid="";
	$cid1="";
	$today=date("d/m/Y");
	
	if(isset($_GET['aid']))
	{
		$aid=$_GET['aid'];
	}
	else
	{
		header("location: adminlogin.php");
	}	
	if(isset($_POST['btn_inspro']))
	{
		header("location: insertprod.php?aid=$aid&opr=add");
	}
	if(isset($_POST['btn_viewpro']))
	{
		header("location: viewprod.php?aid=$aid");
	}	
	if(isset($_POST['btn_inscat']))
	{
		header("location: insertcategory.php?aid=$aid&opr=add");
	}
	if(isset($_POST['btn_viewcat']))
	{
		header("location: viewcategory.php?aid=$aid");
	}	
	if(isset($_POST['btn_view']))
	{
		header("location: viewcustomer.php?aid=$aid");
	}	
	if(isset($_POST['btn_vorders']))
	{
		header("location: vieworders.php?aid=$aid");
	}	
	if(isset($_POST['btn_custreport']))
	{
		header("location: customerreport.php?aid=$aid");
	}
	if(isset($_POST['btn_prodreport']))
	{
		header("location: productreport.php?aid=$aid");
	}	
	if(isset($_POST['btn_logout']))
	{
		//session_write_close();
		session_start();
		session_destroy();
		header("location: adminlogin.php");
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
                <a class="navbar-brand" href="adminlogin.php"><strong>SabiStore</strong>&nbsp;<sub><font size='3'>The Ultimate Online Shop</font></sub></a>
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
						else
						{
							echo "<li><a href='customer_register.php?cid=$cid1'>Signup</a></li>";
						}
					?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+91-9768626899</a></li>
                            <li><a href="#"><strong>Mail: </strong>sabinaik10@gmail.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>Shristi<br />
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
			&nbsp;
		</div>
		<div class="row">
			<!--<div class="col-md-9">-->
                <div>
                    <ol class="breadcrumb">                       
                        <li><h2>Admin Dashboard</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
				 <div class="row">
					<!--Sub content Elements-->    
					<div class="col-md-12">
					<?php
						echo "<h1>Welcome $aid</h1>";
					?>
					<form method="post">
					<table border="2" cellpadding="0" cellspacing="0">
						 <tr>							
							<td>
								<button class="grey" type="submit" name="btn_inspro" value="Insert Product" id="button-in">Insert Product</button>&nbsp;
								<button class="grey" type="submit" name="btn_viewpro" value="View Product" id="button-in">View Product</button>&nbsp;
								<button class="grey" type="submit" name="btn_inscat" value="Insert Product" id="button-in">Insert Category</button>&nbsp;
								<button class="grey" type="submit" name="btn_viewcat" value="View Product" id="button-in">View Category</button>&nbsp;
								<button class="grey" type="submit" name="btn_view" value="View Customer" id="button-in"/>View Customer</button>&nbsp;
								<button class="grey" type="submit" name="btn_custreport" value="custreport" id="button-in"/>Customer Reports</button>&nbsp;
								<button class="grey" type="submit" name="btn_prodreport" value="prodreport" id="button-in"/>Product Reports</button>&nbsp;
								<button class="grey" type="submit" name="btn_vorders" value="vorders" id="button-in"/>View Orders</button>&nbsp;
								<button class="grey" type="submit" name="btn_logout" value="Logout" id="button-in"/>Log out</button>
							</td>
						 </tr>
					</table>	
					</form>
					</div>
				</div>
			<!--</div>-->
		</div>
		<div class="row">
			<div>
				<h2>Measured service</h2>
            </div>			
			<!--Measured Service-->
			<div class="col-md-12">
				<?php
					//echo "<h1>Welcome $aid</h1>";
					$sql_sel=mysqli_query($con, "select * from customer where login='yes'");
					$count=mysqli_num_rows($sql_sel);
					echo "Active Customers Count: ",$count;
					//
					if($count>0)
					{
						echo "<table border='1' align='center' width='75%'>";
						echo "<tr><td colspan='2' align='center'><font size='6'>Active Customers Monitor</font></td></tr>";
						echo "<tr><td align='left'><font size='3'>Total Active Customers: $count</font></td><td align='right'><font size='3'>Date: $today</font></td></tr>";
						echo "<tr><td colspan='2' align='center'>";
						echo "<table border='1' align='center' width='40%' cellpadding='5' cellspacing='5'>";
						echo "<tr><td align='center'>Order Placed</td><td rowspan='4'>";
						//temp table 
						//echo "<table border='1' align='left' cellpadding='0' cellspacing='0'>";
						//echo "<tr><td width='10'>X</td><tr><tr><td  width='10'>Y</td><tr><tr><td  width='10'>Z</td><tr><tr><td  width='10'>C99</td><tr>";
						//echo "</table>";
						//Level plotting
						/*$color1="";
						$color2="";
						$color3="";*/
						
						$sql_lvl=mysqli_query($con, "select * from level where cid in (select cid from customer where login='yes')");
						$lvlcount=mysqli_num_rows($sql_lvl);
						while($rowlvl=mysqli_fetch_array($sql_lvl))
						{
							$color1=$color2=$color3="";
							/*$color1="";
							$color2="";
							$color3="";*/
							$title1=$title2=$title3="";
							
							if ($rowlvl[2]==1)
							{
								$color1="lightblue";
								$title1=$rowlvl[1]." Register/Login";
							}
							else
							{
								$color2=$color3="white";
								$title2=$title3="";
							}
							
							if ($rowlvl[2]==2)
							{
								$color1=$color2="teal";
								$title1=$rowlvl[1]." Register/Login";
								$title2=$rowlvl[1]." Adding Items to Cart";
							}
							else
							{
								$color3="white";
								$title3="";
							}
							
							if ($rowlvl[2]==3)
							{
								$color1=$color2=$color3="aqua";
								$title1=$rowlvl[1]." Register/Login";
								$title2=$rowlvl[1]." Adding Items to Cart";
								$title3=$rowlvl[1]."Order Placed";
							}
							//title=",$rowlvl[1]," Order Placed
							echo "<table border='1' align='left' cellpadding='0' cellspacing='0'>";
							echo "<tr><td width='10' title='",$title3,"' bgcolor=",$color3,">&nbsp;</td></tr><tr><td width='10' title='",$title2,"' bgcolor=",$color2,">&nbsp;</td></tr><tr><td width='10' title='",$title1,"' bgcolor=",$color1,">&nbsp;</td></tr><tr ><td width='10' bgcolor='#18b424'>",$rowlvl[1],"</td></tr>";
							echo "</table>";
						}					
						echo "</td></tr> ";
						echo "<tr><td align='center'>Adding Items to Cart</td></tr>";
						echo "<tr><td align='center'>Register/Login</td></tr>";
						echo "<tr><td align='center'>Customer Id</td></tr>";
						echo "</table>";
						echo "</td></tr>";						
						echo "</table>";
					}
					else
					{
						$msg=$msg."No Customers Currently Active";
					}
				?>			
			</div>
		</div>
		<div class="row">
			<div>
				<h2>Measured service</h2>
            </div>			
			<!--Measured Service-->
			<div class="col-md-12">
				<?php
					//echo "<h1>Welcome $aid</h1>";
					$sql_sel=mysqli_query($con, "select * from customer where login='yes'");
					$count=mysqli_num_rows($sql_sel);
					echo "Active Customers Count: ",$count;
					//
					if($count>0)
					{
						echo "<table border='1' align='center' width='75%'>";
						echo "<tr><td colspan='2' align='center'><font size='6'>Active Customers Monitor</font></td></tr>";
						echo "<tr><td align='left'><font size='3'>Total Active Customers: $count</font></td><td align='right'><font size='3'>Date: $today</font></td></tr>";
						echo "<tr><td colspan='2' align='center'>";
						echo "<table border='0' align='center' width='40%' cellpadding='5' cellspacing='5'>";
						echo "<tr><td align='center'>";
						//header table
						echo "<table border='1'  align='left' cellpadding='0' cellspacing='0'>";
						echo "<tr><td>Order Placed</td><tr><tr><td>Adding Items to Cart&nbsp;</td><tr><tr><td>Register/Login</td><tr><tr><td>Customer Id</td><tr>";
						echo "</table>";
						//Level plotting
						$sql_lvl=mysqli_query($con, "select * from level where cid in (select cid from customer where login='yes')");
						$lvlcount=mysqli_num_rows($sql_lvl);
						while($rowlvl=mysqli_fetch_array($sql_lvl))
						{
							$color1=$color2=$color3="";
							$title1=$title2=$title3="";
							
							if ($rowlvl[2]==1)
							{
								$color1="lightblue";
								$title1=$rowlvl[1]." Register/Login";
							}
							else
							{
								$color2=$color3="white";
								$title2=$title3="";
							}
							
							if ($rowlvl[2]==2)
							{
								$color1=$color2="teal";
								$title1=$rowlvl[1]." Register/Login";
								$title2=$rowlvl[1]." Adding Items to Cart";
							}
							else
							{
								$color3="white";
								$title3="";
							}
							
							if ($rowlvl[2]==3)
							{
								$color1=$color2=$color3="aqua";
								$title1=$rowlvl[1]." Register/Login";
								$title2=$rowlvl[1]." Adding Items to Cart";
								$title3=$rowlvl[1]."Order Placed";
							}
							//title=",$rowlvl[1]," Order Placed
							echo "<table border='1' align='left' cellpadding='0' cellspacing='0'>";
							echo "<tr><td width='10' title='",$title3,"' bgcolor=",$color3,">&nbsp;</td></tr><tr><td width='10' title='",$title2,"' bgcolor=",$color2,">&nbsp;</td></tr><tr><td width='10' title='",$title1,"' bgcolor=",$color1,">&nbsp;</td></tr><tr ><td width='10' bgcolor='#18b424'>",$rowlvl[1],"</td></tr>";
							echo "</table>";
						}

						echo "</td></tr>";
						echo "</table>";
						echo "</td></tr> ";
						//echo "<tr><td align='center'>Adding Items to Cart</td></tr>";
						//echo "<tr><td align='center'>Register/Login</td></tr>";
						//echo "<tr><td align='center'>Customer Id</td></tr>";
						//echo "</table>";
						echo "</td></tr>";						
						echo "</table>";
					}
					else
					{
						$msg=$msg."No Customers Currently Active";
					}
				?>			
			</div>
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
