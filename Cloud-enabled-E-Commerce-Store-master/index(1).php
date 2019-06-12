<?php
	//session_start();	
	$con = mysqli_connect("localhost","root","") or die("No Connection");
	mysqli_select_db($con, 'sabistore') or die("No Database name");

	$msg="";
	$cid="NA";
	$sqlstmt="";
	$catid="";
	$pgno=0;
	$searchqry="";
	$opt="";
	$val="";
	$serid="";
	$catid1="";
	$csid="";
    $cid1="";

	if(isset($_GET['cid']))
		$cid1=$_GET['cid'];
	else
		$cid1="NA";
	
	if(isset($_POST['btn_log']))
	{
		$uname=$_POST['txtemail'];
		$pwd=$_POST['txtpass'];
	
		$sql=mysqli_query($con, "SELECT * FROM customer WHERE email='$uname' AND password='$pwd'");						
		$row=mysqli_fetch_array($sql);
		$cid=$row[0];
		//echo $cid;
		$email=$row[4];
			
		$cout=mysqli_num_rows($sql);
		if($cout>0)
		{	
			session_start();
			$_SESSION['login']="1";
			$_SESSION['user']=$email;
			
			$sql_update=mysqli_query($con, "UPDATE customer set login='yes' where cid='$cid'");
			
			if($sql_update==true)
			{
				//level update
				$sql_lvl=mysqli_query($con, "select * from level where cid='$cid'");
				$rowlvl=mysqli_fetch_row($sql_lvl);
				$lvlid=$rowlvl[0];
				
				$sql_lvl_upd=mysqli_query($con, "update level set cid='$cid',lvl=1 where lvlid='$lvlid'");
				//echo "update level set cid='$cid1',lvl=1 where lvlid='$lvlid'";	
				if($sql_lvl_upd==true)
				{
					echo "level 1 updated";
				}
				header("location: customer_profile.php?cid=$cid");
			}
			else
				$msg="Update Error: customer record cannot be updated";
		}	
		else
		{
			$msg="The email or password you entered is incorrect";
		}
	}
	
	if(isset($_POST['btn_rst']))
	{
		$msg="";		
	}	
	
	if(isset($_POST['btn_ser']))
	{
		$serchval=$_POST['txtsearch'];
		if ($serchval!="")
		{
			if ($cid1!="NA")
			{		
				//echo "Search Click=$serchval Cid=$cid1";
				$searchqry="opt=search&searchval=$serchval&cid=$cid1";
			}
			else
			{
				//echo "Search Click=$serchval Cid=$cid1";
				$searchqry="opt=search&searchval=$serchval&cid=$cid1";
			}
			header("location: index.php?$searchqry");
		}	
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
                                <div> Srishti<br />
                                    Mira Road<br />
                                    INDIA
								</div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" method="post">
                    <div class="form-group">
                        <input type="text" name="txtsearch" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 		
                    <button type="submit" class="btn btn-primary" name="btn_ser">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="well well-lg offer-box text-center">
                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !                
                </div>
                <div class="main box-border" >
                    <div id="mi-slider" class="mi-slider" >
                        <ul>

                            <li><a href="#">
                                <img src="assets/ItemSlider/images/1.jpg" alt="img01"><h4>Boots</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/2.jpg" alt="img02"><h4>Oxfords</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/3.jpg" alt="img03"><h4>Loafers</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/4.jpg" alt="img04"><h4>Sneakers</h4>
                            </a></li>
                        </ul>
                        <ul>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/5.jpg" alt="img05"><h4>Belts</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/6.jpg" alt="img06"><h4>Hats &amp; Caps</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/7.jpg" alt="img07"><h4>Sunglasses</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/8.jpg" alt="img08"><h4>Scarves</h4>
                            </a></li>
                        </ul>
                        <ul>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/9.jpg" alt="img09"><h4>Casual</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/10.jpg" alt="img10"><h4>Luxury</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/11.jpg" alt="img11"><h4>Sport</h4>
                            </a></li>
                        </ul>
                        <ul>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/12.jpg" alt="img12"><h4>Carry-Ons</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/13.jpg" alt="img13"><h4>Duffel Bags</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/14.jpg" alt="img14"><h4>Laptop Bags</h4>
                            </a></li>
                            <li><a href="#">
                                <img src="assets/ItemSlider/images/15.jpg" alt="img15"><h4>Briefcases</h4>
                            </a></li>
                        </ul>
                        <nav>
                            <a href="#">Shoes</a>
                            <a href="#">Accessories</a>
                            <a href="#">Watches</a>
                            <a href="#">Bags</a>
                        </nav>
                    </div>
                    
                </div>
                <br />
            </div>
            <!-- /.col -->
            
            <div class="col-md-3 text-center">  
				<div class=" col-md-12 col-sm-6 col-xs-6">				
                       <div class="thumbnail product-box">                       
                        <div class="caption">
						 <form method="post">
							<p style="color:#FFF;background-color:#18b424"><font size="4">Login credentials</font></p>
							<table border="0" cellspacing="0" cellpadding="0">							
							<tr>
								<td>Email Id&nbsp;</td>
								<td><input type="text" name="txtemail" size="15" class="form-control"></td>
							</tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr>
								<td>Password&nbsp;</td>
								<td><input type="password" name="txtpass" size="15" class="form-control"></td>
							</tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr>
								<td colspan="2"><input type="submit" value="Login" name="btn_log" class="btn btn-primary">&nbsp;<input type="reset" value="Cancel" name="btn_rst" class="btn btn-primary"></form></td>
							</tr>
							<td colspan="2"><?php echo "<font color='red'>",$msg;?>&nbsp;</td>
							<tr>
								<td colspan="2">New Customer <a href="customer_register.php">Click here</a> to Register</td>
							</tr>
							</table>
			
                        </div>
                    </div>
                </div>
				
				<div class=" col-md-12 col-sm-6 col-xs-6">
                    <div class="offer-text">
                        Customer Reviews
                    </div>
                    <div class="thumbnail product-box">
                        <p>
							<br>
							<br>
							<br>
						</p>
                        <div class="caption">                       
                            <p>
							<marquee direction="up">
							Best ever online shopping website<br>
							Different brands awesome products<br>
							Product quality world class<br>
							Best ever online shopping website<br>
							Different brands awesome products<br>
							Product quality world class<br>
							Best ever online shopping website<br>
							</marquee>
							</p>
                        </div>
                    </div>
                </div>
				
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="index.php?cid=<?php echo $cid1?>&catid=CAT1" class="list-group-item active">Electronics
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
                        <li>
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
                    <a href="index.php?cid=<?php echo $cid1?>&catid=CAT2" class="list-group-item active list-group-item-success">Clothing & Wears
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
                    <a href="index.php?cid=<?php echo $cid1?>&catid=CAT3" class="list-group-item active">Accessaries & Extras
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
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Electronics</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>1235</strong>items</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Sort Products &nbsp;
							<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
               <!-- /.row -->
                <div class="row">
				<!-- Product display-->
				<?php
					if(isset($_GET['cid']))	
						$cid1=$_GET['cid'];
					else
						$cid1="NA";
					
					if(isset($_GET['opt']))	
						$opt=$_GET['opt'];
					else
						$opt="view";
					/*
					if(isset($_GET['catid']))	
						$catid=$_GET['catid'];
					else
						$catid="CAT1";
					
					if(isset($_GET['pgno']))	
						$pgno=$_GET['pgno'];
					else
						$pgno=0;
					
					switch($pgno)
					{
						case 1:
							$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 6";
							break;
						case 2:
							$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 12";
							break;
						case 3:
							$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 18";
							break;
						case 4:
							$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 24";
							break;
						case 5:
							$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 30";
							break;
						default:
							$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6";
					}
					*/
					if($opt=="search")
					{
						//echo "opt=$opt<br>";
						
						if(isset($_GET['searchval']))	
							$val=$_GET['searchval'];
						else
							$val="";
						
						if(isset($_GET['pgno']))	
							$pgno=$_GET['pgno'];
						else
							$pgno=0;
						
						switch($pgno)
						{
							case 1:
								$sqlstmt="SELECT * FROM products where pname like '$val%' or pdesc like '$val%' LIMIT 6 offset 6";
								break;
							case 2:
								$sqlstmt="SELECT * FROM products where pname like '$val%' or pdesc like '$val%'LIMIT 6 offset 12";
								break;
							case 3:
								$sqlstmt="SELECT * FROM products where pname like '$val%' or pdesc like '$val%' LIMIT 6 offset 18";
								break;
							case 4:
								$sqlstmt="SELECT * FROM products where pname like '$val%' or pdesc like '$val%' LIMIT 6 offset 24";
								break;
							case 5:
								$sqlstmt="SELECT * FROM products where pname like '$val%' or pdesc like '$val%' LIMIT 6 offset 30";
								break;
							default:
								$sqlstmt="SELECT * FROM products where pname like '$val%' or pdesc like '$val%' LIMIT 6";
						}
						//echo $sqlstmt;						
					}
					else //normal view
					{
						if(isset($_GET['catid']))	
							$catid=$_GET['catid'];
						else
							$catid="CAT1";
						
						if(isset($_GET['pgno']))	
							$pgno=$_GET['pgno'];
						else
							$pgno=0;
						
						switch($pgno)
						{
							case 1:
								$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 6";
								break;
							case 2:
								$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 12";
								break;
							case 3:
								$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 18";
								break;
							case 4:
								$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 24";
								break;
							case 5:
								$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6 offset 30";
								break;
							default:
								$sqlstmt="SELECT * FROM products where catid='$catid' LIMIT 6";
						}
						//echo $sqlstmt;
					}
					$i=1;
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
                            <img src="<?php echo $row['pimage'];?>" alt="<?php echo $row['pname'];?>" heigth="120" width="100"/>
                            <div class="caption">
                                <h3><?php echo $row['pname'];//$row['pid'],":",$row['pname'];?></h3>
                                <p>Price : <strong><?php echo $row['pprice'];?></strong></p>
                                <p><a>Description</a></p>
                                <p><?php echo $row['pdesc'];?>  </p>
                                <p><a href="addcart.php?cid=<?php echo $cid1;?>&pid=<?php echo $row['pid'];?>&src=1" class="btn btn-success" role="button">Add To Cart</a> 
								<a href="viewdetails.php?cid=<?php echo $cid1;?>&pid=<?php echo $row['pid'];?>" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                </div>
				<?php
							//insert
							if($opt=="search" && $cid1!="NA")// && $i<=3)
							{
								$catid1=$row['catid'];
								//autogen code
								$sql_sp=mysqli_query($con, "select max(cast(right(serid,length(serid)-1)as signed)) from searchproduct");
								$row_sp=mysqli_fetch_row($sql_sp);
								$serid='S'.($row_sp[0]+1);
								//echo "Ser_id=",$serid;
								
								$sql_ins=mysqli_query($con, "INSERT INTO searchproduct VALUES('$serid','$cid1','$catid1')");

								if($sql_ins==true)
								{
									//echo "$serid inserted";
									$i++;
								}
							}
						}
						//Popoulating category search
						if($opt=="search" && $cid1!="NA")
						{
							$sqlstmt1="SELECT sp.cid,c.catid,c.catname,count(c.catid) FROM searchproduct sp,category c WHERE c.catid=sp.catid and sp.cid='$cid1' group by c.catname;";
							$sql_cs=mysqli_query($con, $sqlstmt1);
							$count=mysqli_num_rows($sql_cs);	
							if($count>0)
							{
								while($row_cs=mysqli_fetch_array($sql_cs))
								{
									$sql_csid=mysqli_query($con, "select max(cast(right(catserid,length(catserid)-2)as signed)) from searchcategory");
									$row_csid=mysqli_fetch_row($sql_csid);
									$csid='CS'.($row_csid[0]+1);
									//echo $csid,"<br>";
									//echo "INSERT INTO searchcategory VALUES('$csid','$cid1','$row_cs[1]',$row_cs[3])<br>";
									$sql_ins=mysqli_query($con, "INSERT INTO searchcategory VALUES('$csid','$cid1','$row_cs[1]',$row_cs[3])");
								}
							}
							
							//empty searchproduct
							$del_sql=mysqli_query($con,"DELETE FROM searchproduct WHERE cid='$cid1'");
							if($del_sql)
								echo "Search Product Empty<br>";
							else
								echo "Could not Delete<br>";
						}
					}
					else
					{
						echo "No Product to display.";
					}
				?>	
                <!-- /.col -->
                </div>
                <!-- /.row -->
				<!--SELECT * FROM products LIMIT 6 OFFSET 6-->
				<?php 
					if($opt=="search")
					{
				?>
                <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="index.php?opt=search&searchval=<?php echo $val;?>&cid=<?php echo $cid1;?>&pgno=1">1</a></li>
                        <li><a href="index.php?opt=search&searchval=<?php echo $val;?>&cid=<?php echo $cid1;?>&pgno=2">2</a></li>
                        <li><a href="index.php?opt=search&searchval=<?php echo $val;?>&cid=<?php echo $cid1;?>&pgno=3">3</a></li>
                        <li><a href="index.php?opt=search&searchval=<?php echo $val;?>&cid=<?php echo $cid1;?>&pgno=4">4</a></li>
                        <li><a href="index.php?opt=search&searchval=<?php echo $val;?>&cid=<?php echo $cid1;?>&pgno=5">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
				<?php
					}
					else// normal view
					{
				?>
				<div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="index.php?cid=<?php echo $cid1?>&catid=<?php echo $catid;?>&pgno=1">1</a></li>
                        <li><a href="index.php?cid=<?php echo $cid1?>&catid=<?php echo $catid;?>&pgno=2">2</a></li>
                        <li><a href="index.php?cid=<?php echo $cid1?>&catid=<?php echo $catid;?>&pgno=3">3</a></li>
                        <li><a href="index.php?cid=<?php echo $cid1?>&catid=<?php echo $catid;?>&pgno=4">4</a></li>
                        <li><a href="index.php?cid=<?php echo $cid1?>&catid=<?php echo $catid;?>&pgno=5">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
				<?php
					}
				?>
                <!-- /.row -->
        </div>
		<!-- /.container -->
	</div>
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
