<?php
	//session_start();	
	$con = mysqli_connect("localhost","root","") or die("No Connection");
	mysqli_select_db($con, 'sabistore') or die("No Database name");

	$msg="";
	$aid="NA";
	$cid1="";

	if(isset($_POST['btn_log']))
	{
		//$msg="";
		$uname=$_POST['txtuser'];
		$pwd=$_POST['txtpass'];
	
		$sql=mysqli_query($con, "SELECT * FROM adminlogin WHERE id='$uname' AND pwd='$pwd'");						
		$row=mysqli_fetch_array($sql);
		$aid=$row[0];
		//echo $cid;
		
		$cout=mysqli_num_rows($sql);
		if($cout>0)
		{	
			session_start();
			$_SESSION['login']="1";
			
			//$sql_update=mysqli_query($con, "UPDATE customer set login='yes' where cid='$cid'");
			
			//if($sql_update==true)
			header("location: admin_profile.php?aid=$aid");
			//else
			//	$msg="Update Error: customer record cannot be updated";
		}	
		else
		{
			$msg="The user or password you entered is incorrect";
		}
	}
	if(isset($_POST['btn_rst']))
	{
		$msg="";
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
                        <li><h2>Admin Login</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
				 <div class="row">
					<!--Sub content Elements-->										
					<div class="col-md-9">
						<div class="col-md-9"> 
							<div class=" col-md-6 col-sm-6 col-xs-6">				
								<div class="thumbnail product-box">                       
									<div class="caption">
									 <form method="post">
										<p style="color:#FFF;background-color:#18b424;text-align:center;"><font size="4">Login credentials</font></p>
										<table border="0" cellspacing="0" cellpadding="0">							
										<tr>
											<td>Username&nbsp;</td>
											<td><input type="text" name="txtuser" size="15" class="form-control"></td>
										</tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr>
											<td>Password&nbsp;</td>
											<td><input type="password" name="txtpass" size="15" class="form-control"></td>
										</tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr>
											<td align="center" colspan="2"><input type="submit" value="Login" name="btn_log" class="btn btn-primary">&nbsp;<input type="reset" value="Cancel" name="btn_rst" class="btn btn-primary"></form></td>
										</tr>
										<td colspan="2"><?php echo "<font color='red'>",$msg;?>&nbsp;</td>
										<tr>
											<td colspan="2">&nbsp;</td>
										</tr>
										</table>			
									</div>
								</div>
							</div>
						</div>			
					</div>				
				</div>
			<!--</div>-->
		</div>
		 <div class="row">
			&nbsp;
		</div>
		 <div class="row">
			&nbsp;
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
