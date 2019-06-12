<?php

	$con = mysqli_connect("localhost","root","") or die("No Connection");
	mysqli_select_db($con, "sabistore") or die("No Database name");
	
	$sqlstmt="";
	$fcatid="";
	$cid1="";
	
	session_start();
	
	if(!(isset($_SESSION['login'])|| $_SESSION['login']!=""))
	{
		header("location: index.php");
	}
	
	if(isset($_GET['cid']))	
		$cid1=$_GET['cid'];

	$sql=mysqli_query($con, "SELECT * FROM customer WHERE cid='$cid1'");						
	$row=mysqli_fetch_array($sql);
	$cname=$row[1];
	/*
	//level update
	$sql_lvl=mysqli_query($con, "select * from level where cid='$cid1'");
	$rowlvl=mysqli_fetch_row($sql_lvl);
	$lvlid=$rowlvl[0];
	
	$sql_lvl_upd=mysqli_query($con, "update level set cid='$cid1',lvl=1 where lvlid='$lvlid'");
	//echo "update level set cid='$cid1',lvl=1 where lvlid='$lvlid'";	
	if($sql_lvl_upd==true)
	{
		echo "level 1 updated";
	}
	*/
	if (isset($_SESSION['user']))
	{   
		$na=$_SESSION['user'];
	}

	if(isset($_POST['btn_edit']))
	{
		header("location: customer_register.php?cid=$cid1&opr=edit");
	}
	
	if(isset($_POST['btn_show']))
	{
		header("location: showproduct.php?cid=$cid1");
	}
	
	if(isset($_POST['btn_cart']))
	{
		header("location: viewcart.php?cid=$cid1");
	}

	if(isset($_POST['btn_logout']))
	{
		header("location: logout.php?cid=$cid1");
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
                <a class="navbar-brand" href="index.php?cid=<?php echo $cid1;?>"><strong>SabiStore</strong>&nbsp;<sub><font size='3'>The Ultimate Online Shop</font></sub></a>
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
						/*else
						{
							echo "<li><a href='customer_register.php?cid=$cid1'>Signup</a></li>";
						}*/
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
                        <li><h2>Dashboard</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                <!--Main content Elements-->               
				<form method="post">
				<div class="col-md-9">
				<h2>Customer Profile</h2>
				<?php
				echo "<h2>Welcome $cname</h2>";
				?>
				<!--</font>-->
				 <table border="2" cellpadding="0" cellspacing="0">	
				 <tr>
					<td>
						<button class="grey" type="submit" name="btn_edit" value="Edit Profile" id="button-in">Edit Profile</button>&nbsp;
						<button class="grey" type="submit" name="btn_show" value="Show Products" id="button-in">Show Products</button>&nbsp;
						<button class="grey" type="submit" name="btn_cart" value="View Cart" id="button-in">View Cart</button>&nbsp;
						<button class="grey" type="submit" name="btn_logout" value="Log out" id="button-in">Log out</button>
					</td> 
				</tr>
				</table>
				</div>
				<!-- User search based product list src=3-->
				</form>
				</div>
            <!-- /.col -->
				<div>
                    <ol class="breadcrumb">                       
                        <li><h2>Favourite Product</h2></li>
                    </ol>
                </div>
				<?php				
					//Favorite Product display
					//select catid,sum(catcount) as maxcount from searchcategory where cid='C3' group by catid  order by maxcount desc  limit 1
					
					$sql_fcat=mysqli_query($con, "select catid,sum(catcount) as maxcount from searchcategory where cid='$cid1' group by catid  order by maxcount desc  limit 1");						
					$row_fcat=mysqli_fetch_array($sql_fcat);
					$fcatid=$row_fcat[0];
					
					if(isset($_GET['pgno']))	
							$pgno=$_GET['pgno'];
					else
						$pgno=0;
					
					switch($pgno)
					{
						case 1:
							$sqlstmt="SELECT * FROM products where catid='$fcatid' order by (select cast(right(pid,length(pid)-1)as signed)) desc limit 6 offset 6";
							break;
						case 2:
							$sqlstmt="SELECT * FROM products where catid='$fcatid' order by (select cast(right(pid,length(pid)-1)as signed)) desc limit 6 offset 12";
							break;
						case 3:
							$sqlstmt="SELECT * FROM products where catid='$fcatid' order by (select cast(right(pid,length(pid)-1)as signed)) desc limit 6 offset 18";
							break;
						case 4:
							$sqlstmt="SELECT * FROM products where catid='$fcatid' order by (select cast(right(pid,length(pid)-1)as signed)) desc limit 6 offset 24";
							break;
						case 5:
							$sqlstmt="SELECT * FROM products where catid='$fcatid' order by (select cast(right(pid,length(pid)-1)as signed)) desc limit 6 offset 30";
							break;
						default:
							$sqlstmt="SELECT * FROM products where catid='$fcatid' order by (select cast(right(pid,length(pid)-1)as signed)) desc limit 6";
					}
					//SELECT * FROM products where catid='$fcatid' order by (select cast(right(pid,length(pid)-1)as signed)) desc limit 6
					
					$sql_sel=mysqli_query($con, $sqlstmt);
					$count=mysqli_num_rows($sql_sel);	
					if($count>0)
					{
						while($row=mysqli_fetch_array($sql_sel))
						{
				?>
				 <!-- /.col -->				
				<div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="<?php echo $row['pimage'];?>" alt="<?php echo $row['pname'];?>"  heigth="120" width="100"/>
                            <div class="caption">
                                <h3><?php echo $row['pname'];?></h3>
                                <p>Price : <strong><?php echo $row['pprice'];?></strong></p>
                                <p><a>Description</a></p>
                                <p><?php echo $row['pdesc'];?>  </p>
                                <p><a href="addcart.php?cid=<?php echo $cid1;?>&pid=<?php echo $row['pid'];?>&src=3" class="btn btn-success" role="button">Add To Cart</a> 
								<a href="viewdetails.php?cid=<?php echo $cid1;?>&pid=<?php echo $row['pid'];?>" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                </div>
				<?php
						}
					}
					else
					{
						echo "No Product to display.";
					}
				?>	
                <!-- /.col -->	
				</div>
            <!-- /.col -->
			<?php
					//if($count>0)
					//{
			?>
			 <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="customer_profile.php?cid=<?php echo $cid1?>&pgno=1">1</a></li>
                        <li><a href="customer_profile.php?cid=<?php echo $cid1?>&pgno=2">2</a></li>
                        <li><a href="customer_profile.php?cid=<?php echo $cid1?>&pgno=3">3</a></li>
                        <li><a href="customer_profile.php?cid=<?php echo $cid1?>&pgno=4">4</a></li>
                        <li><a href="customer_profile.php?cid=<?php echo $cid1?>&pgno=5">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
			<?php
					//}
			?>
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
