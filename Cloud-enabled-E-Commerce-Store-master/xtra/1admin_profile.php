<?php

	$con = mysqli_connect("localhost","root","") or die("No Connection");
	mysqli_select_db($con, "sabistore") or die("No Database name");
	session_start();
	if(!(isset($_SESSION['login'])|| $_SESSION['login']!=""))
	{
		header("location: login.php");
	}
	if(isset($_GET['aid']))	
		$aid1=$_GET['aid'];

	$sql=mysqli_query($con, "SELECT * FROM adminlogin WHERE id='$aid1'");						
	$row=mysqli_fetch_array($sql);
	$id=$row[1];
	if(isset($_POST['btn_logout']))
	{
		//session_write_close();
		session_start();
		session_destroy();
		header("location:adminlogin.php");
	}

	if(isset($_POST['btn_view']))
	{
		header("location: viewcustomer.php?aid=$aid1");
	}
	
	if(isset($_POST['btn_inspro']))
	{
		header("location: insertprod.php?aid=$aid1&opr=add");
	}
	
	if(isset($_POST['btn_vorders']))
	{
		header("location: vieworders.php?aid=$aid1");
	}

	if(isset($_POST['btn_viewpro']))
	{
		header("location: viewprod.php?aid=$aid1&opr=edit&pid=P1");
	}	
	
	if(isset($_POST['btn_custreport']))
	{
		header("location: customerreport.php?aid=$aid1");
	}
	if(isset($_POST['btn_prodreport']))
	{
		header("location: productreport.php?aid=$aid1");
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
                    <li><a href="#">Track Order</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Signup</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+91-9768626899</a></li>
                            <li><a href="#"><strong>Mail: </strong>sabihanaik10@gmail.com</a></li>
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
                        
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                <!--Main content Elements-->
                
				
				 <div class="clear"></div>
     </div>
	</div>
       <html>
<head>
</head><body>
<form method="post">
<div>
<h4 class="title">Profile</h4><br>
<font size="6">
<?php
echo "<h1>Welcome $id</h1>";
?>
</font>
<br><br>
<table border="0" cellpadding="4" cellspacing="0">
	 <tr>
		
		<td> 	
                	<button class="grey" type="submit" name="btn_inspro" value="Insert Product" id="button-in">Insert Prod</button>
                </td>
      		<td> 	
                	<button class="grey" type="submit" name="btn_viewpro" value="View Product" id="button-in">View Prod</button>
                </td>
		<td> 		
			<button class="grey" type="submit" name="btn_view" value="View Customer" id="button-in"/>View Customer</button>
                </td>
		<td> 	
                	<button class="grey" type="submit" name="btn_custreport" value="custreport" id="button-in"/>Customer Reports</button>
                </td>
		<td> 	
                	<button class="grey" type="submit" name="btn_prodreport" value="prodreport" id="button-in"/>Product Reports</button>
                </td>
		<td> 	
                	<button class="grey" type="submit" name="btn_vorders" value="vorders" id="button-in"/>View Orders</button>
                </td>
		<td> 	
                	<button class="grey" type="submit" name="btn_logout" value="Logout" id="button-in"/>Log out</button>
                </td>
            </tr>

	  </table>	
<br><br><br>
</div>
</form>
</body>
		    </form>
    	</div>
    </div>

				
				
				</div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
	<!--
    
	-->
    <div class="col-md-12 end-box ">
        &copy; 2017-18 | &nbsp; All Rights Reserved | &nbsp; 24x7 support | &nbsp; Email us: sabihanaik10@gmail.com
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