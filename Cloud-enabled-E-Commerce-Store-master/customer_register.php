<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'sabistore') or die('No Database name');
session_start();
if (isset($_SESSION['user'])) 
{    
	$na=$_SESSION['user'];
}
$msg="";
$opr="";
$cid1="";
$lvlid="";
//validation
$err_cname="";
$err_add="";
$err_contact="";
$err_email="";
$err_pass="";
$err_secret="";
$err_ans="";

if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['cid']))	
	$cid1=$_GET['cid'];
else
	$cid1="NA";

	
//--------------add data-----------------

//autogen code
$sql=mysqli_query($con,"select max(cast(right(cid,length(cid)-1)as signed)) from customer");
$row=mysqli_fetch_row($sql);
//echo "Customer id=",$row[0];
$cid='C'.($row[0]+1);
//}
if(isset($_POST['btn_sub']))
{
	$cid=$_POST['cidtxt'];
	$cname=$_POST['cnametxt'];	
	$address=$_POST['addrtxt'];
	$contact=$_POST['contacttxt'];	
	$email=$_POST['emailtxt'];
	$passwd=$_POST['passtxt'];	
    $secret=$_POST['secrettxt'];
	$answer=$_POST['answertxt'];
	
	if(preg_match("/^[A-Za-z -]{3,20}$/",$cname) && strlen($address)>0 && is_numeric($contact) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/", $email) && strlen($passwd)>0)
	{	
		$sql_ins=mysqli_query($con, "INSERT INTO customer VALUES('$cid','$cname','$address','$contact','$email','$passwd','yes','$secret','$answer')");

		if($sql_ins==true)
		{
			/*$msg="1 Row Inserted";
			$sql=mysqli_query("select max(cast(right(cid,length(cid)-1)as signed)) from customer");
			$row = mysqli_fetch_row($sql);				
			$cid='C'.($row[0]+1);*/
			
			$sql_lvlid=mysqli_query($con, "select max(cast(right(lvlid,length(lvlid)-1)as signed)) from level");
			$row=mysqli_fetch_row($sql_lvlid);
			$lvlid='L'.($row[0]+1);
			//echo "Level id=",$lvlid;
			
			$sql_lvl=mysqli_query($con, "insert into level values('$lvlid','$cid',1)");
			//echo "insert into level values('$lvlid','$cid',1)";
			if($sql_lvl==true)
			{
				echo "level 1 inserted";
			}
			
			$_SESSION['login']="1";
			$_SESSION['user']=$email;//$cname;
			
			header("location: customer_profile.php?cid=$cid");
		}
		else
		{
				$msg="Insert Error:".mysqli_error();
		}
	}
	else
	{
			$err_cname="Enter valid characters";
			$err_add="Address cannot be blank";
			$err_contact="Contains numbers only";
			$err_email="Enter valid Email Id";
			$err_pass="password cannot be blank";
			$err_secret="secret question cannot be blank";
			$err_ans="answer cannot be blank";
	}
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	
	$cid=$_POST['cidtxt'];
	$cname=$_POST['cnametxt'];	
	$address=$_POST['addrtxt'];
	$contact=$_POST['contacttxt'];	
	$email=$_POST['emailtxt'];
	$passwd=$_POST['passtxt'];			
	$secret=$_POST['secrettxt'];
	$answer=$_POST['answertxt'];

	$sql_update=mysqli_query($con, "UPDATE customer set cname='$cname',address='$address',contact='$contact',email='$email',password='$passwd',question='$secret',answer='$answer' where cid='$cid'");
	
	if($sql_update==true)
	{
		session_start();
		if (isset($_SESSION['user']))
		{
			$_SESSION['user']=$email;
			$na=$_SESSION['$email'];
		}
		header("location: customer_profile.php?cid=$cid");
	}	
	else
		$msg="Update Fail".mysqli_error();
}
//------------------update cancel----------	
	if(isset($_POST['btn_updcnl']))
	{
		header("location: customer_profile.php?cid=$cid1");
	}
//------------------add cancel----------	
	if(isset($_POST['btn_subcnl']))
	{
		header("location:customer_profile.php?cid=$cid");
	}

?><!DOCTYPE html>
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
                        <li><h2>Customer Credentials</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                <!--Main content Elements-->
				<div class="col-md-9">
				<?php
					if($cid1!="NA")
					{
				?>
				<?php
					}
				?>
				<?php
					if($opr=="edit")
					{
						//echo "<h1>cid=",$cid1,"</h1>";
						$sql=mysqli_query($con, "SELECT * FROM customer WHERE cid='$cid1'");						
						$rs_upd=mysqli_fetch_array($sql);
						//echo $rs_upd['cid'];
					?>
					<form method="post" >
					<h2 class="title">Edit Profile</h2>
						  <table border="0" cellpadding="4" cellspacing="0">
							  <tr>
									<td>Customer Id:</td>
									<td>
										<input type="text" name="cidtxt" id="textbox" value="<?php echo $rs_upd['cid'];?>" readonly />
									</td>
								</tr>
								<tr>
									<td>Customer Name:</td>
									<td>
										<input type="text" name="cnametxt" id="textbox" value="<?php echo $rs_upd['cname'];?>"/>
									</td>
								</tr>
								<tr>
									<td>Address:</td>
									<td>
										<textarea name="addrtxt" cols="22" rows="3"><?php echo $rs_upd['address'];?></textarea>
									</td>
								</tr>
								<tr>
									<td>Contact No:</td>
									<td>
										<input type="text" name="contacttxt" id="textbox" value="<?php echo $rs_upd['contact'];?>"/>
									</td>
								</tr>
								<tr>
									<td>Email Id:</td>
									<td>
										<input type="text" name="emailtxt" id="textbox" value="<?php echo $rs_upd['email'];?>"/>
									</td>
								</tr>
								<tr>
									<td>Password :</td>
									<td>
										<input type="password" name="passtxt" value="<?php echo $rs_upd['password'];?>"/>
									</td>
								</tr>
								<tr>
									<td>Secret Question:</td>
									<td>
										<input type="text" name="secrettxt" value="<?php echo $rs_upd['question'];?>"/>
									</td>	
								</tr>								
								<tr>
									<td>Answer :</td>
									<td>
										<input type="text" name="answertxt" value="<?php echo $rs_upd['answer'];?>"/>								   
									</td>
								</tr>								
								<tr>
									<td colspan="2">
										<button class="grey" type="submit" name="btn_updcnl" value="Cancel" id="button-in">Cancel</button>
										<button class="grey" type="submit" name="btn_upd" value="Update" id="button-in">Update</button>
									</td>
								</tr>
						  </table>
					</form> 
				<?php	
					}
					else
					{
				?>
					<h2 class="title">Register Yourself</h2>
					<form method="post">					
						  <table border="0" cellpadding="4" cellspacing="0">
							  <tr>
									<td>Customer Id:</td>
									<td><input type="text" name="cidtxt" id="textbox" value="<?php echo $cid;?>" readonly/>
									</td>
								</tr>
								<tr>
									<td>Customer Name:</td>
									<td>
										<input type="text" name="cnametxt" id="textbox" />
									</td>
									<td><?php echo "<label style='color:red;'>",$err_cname,"<label/>";?></td>
								</tr>
								<tr>
									<td>Address:</td>
									<td>
										<textarea name="addrtxt"></textarea>
									</td>
									<td><?php echo "<label style='color:red;'>",$err_add,"<label/>";?></td>
								</tr>
								<tr>
									<td>Contact No:</td>
									<td>
										<input type="text" name="contacttxt" id="textbox" />
									</td>
									<td color="red"><?php echo "<label style='color:red;'>",$err_contact,"<label/>";?></td>
								</tr>
								<tr>
									<td>Email Id:</td>
									<td>
										<input type="text" name="emailtxt" id="textbox" />
									</td>
									<td><?php echo "<label style='color:red;'>",$err_email,"<label/>";?></td>
								</tr>
								<tr>
									<td>Password :</td>
									<td>
										<input type="password" name="passtxt" />
									</td>
									<td><?php echo "<label style='color:red;'>",$err_pass,"<label/>";?></td>
								</tr>			
								<tr>
									<td>Secret Question:</td>
									<td>
										<input type="text" name="secrettxt" />
									</td>
									<td><?php echo "<label style='color:red;'>",$err_secret,"<label/>";?></td>
								</tr>								
								<tr>
									<td>Answer :</td>
									<td>
										<input type="text" name="answertxt" />
									</td>
									<td><?php echo "<label style='color:red;'>",$err_ans,"<label/>";?></td>
								</tr>								
								<tr>
									<td colspan="2">
										<button class="grey" type="submit" name="btn_subcnl" value="Cancel" id="button-in">Cancel</button>
										<button class="grey" type="submit" name="btn_sub" value="Register" id="button-in">Register</button>								
									</td>
								</tr>
						  </table>
						</div>
					</form> 
				<?php
					}
				?>
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
