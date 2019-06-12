<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'optic') or die('No Database name');

$msg="";
$opr="";
$pid="";
$cid="";
$fid="";
$cartid="";

if(isset($_GET['cid']))	
	$cid=$_GET['cid'];
else
	$cid="NA";
	
if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['pid']))
	$pid=$_GET['pid'];

if(isset($_GET['ptype']))
	$ptype=$_GET['ptype'];


if ($cid=="NA")
{
	//echo "javascript:alert('please login to buy product');";
	header("location: login.php");
}
else
{
	//autogen code
	if(isset($_POST['btn_sub']))
{	if($ptype=='Eyeglasses' or $ptype=='Lens')
{

$sql=mysqli_query($con, "select max(cast(right(fid,length(fid)-1)as signed)) from frames");
$row=mysqli_fetch_row($sql);
$fid='F'.($row[0]+1);
	$ftype=$_POST['ftypetxt'];


    $frs = mysqli_real_escape_string($_POST['frstxt']);
    
    	
	$frc=$_POST['frctxt'];
	$fra=$_POST['fratxt'];
	$fls=$_POST['flstxt'];
	$flc=$_POST['flctxt'];
	$fla=$_POST['flatxt'];		
	

	

$sql_ins=mysqli_query($con, "INSERT INTO frames VALUES('$fid','$ftype','$frs','$frc','$fra','$fls','$flc','$fla')");


	$sql=mysqli_query($con, "select max(cast(right(cartid,length(cartid)-2)as signed)) from cart");
	$row=mysqli_fetch_row($sql);
	//echo "Customer id=",$row[0];
	$cartid='CT'.($row[0]+1);

	$sql_ins=mysqli_query($con, "INSERT INTO cart VALUES('$cartid','$cid','$pid','$fid')");

	if($sql_ins==true)
	{
		header("location:viewcart.php?cid=$cid");
	}
	else
	{	
		$msg="Insert Error:".mysqli_error();		
	}

}
else
{
	$sql=mysqli_query($con, "select max(cast(right(cartid,length(cartid)-2)as signed)) from cart");
	$row=mysqli_fetch_row($sql);
	//echo "Customer id=",$row[0];
	$cartid='CT'.($row[0]+1);

	$sql_ins=mysqli_query($con, "INSERT INTO cart VALUES('$cartid','$cid','$pid','NApp')");

	if($sql_ins==true)
	{
		header("location:viewcart.php?cid=$cid");
	}
	else
	{	
		$msg="Insert Error:".mysqli_error();		
	}
}
}	}
if(isset($_POST['btn_cancel']))
{
header("location:index.php?cid=$cid");
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
                    
                </div>
                <!-- /.div -->
                <div class="row">
                <!--Main content Elements-->
                
				
				  <div class="header-bottom-right">
				  <?php
if($cid!="NA")
{
?>	
     <ul class="icon1 sub-icon1 profile_img">
			<li><a class="active-icon c2" href="viewcart.php?cid=<?php echo $cid ?>"> </a>	
			</li>
		</ul>
	    <ul class="last"><li><a href="viewcart.php?cid=<?php echo $cid ?>">Cart</a></li></ul>
	  </div>
     <div class="clear"></div>
     </div>
	</div>
       <html>
<head>
</head><body>
<form method="post">
<?php
if($ptype=='Eyeglasses' or $ptype=='Lens')
{
?>
<div class="mens"><br></div>
<h1><font size="6">Prescription Details</font></h1>
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
	       	<tr><br>
            	<td>Frame type</td>
            	<td><input type="radio" name="ftypetxt" value="Distance" checked>Distance</td>
		<td><input type="radio" name="ftypetxt" value="Reading">Reading</td>
            </tr>     
            <tr>
		<td><br>Right Spherical</td>
            	<td><br>
		<select id="frstxt" name="frstxt">
  			<option value="-4.00">-4.00</option>
			<option value="-3.50">-3.50</option>
 			<option value="-3.00">-3.00</option>
  			<option value="-2.50">-2.50</option>
 			<option value="-2.00">-2.00</option>
			<option value="-1.50">-1.50</option>
			<option value="-1.00">-1.00</option>
 			<option value="-0.50">-0.50</option>
			<option value="0.00" selected="selected">0.00</option>
 			<option value="0.50">0.50</option>
  			<option value="1.00">1.00</option>
 			<option value="1.50">1.50</option>
			<option value="2.00">2.00</option>
			<option value="2.50">2.50</option>
 			<option value="3.00">3.00</option>
  			<option value="3.50">3.50</option>
 			<option value="4.00">4.00</option>
		
		</select>
                </td>
        	</tr>

 	<tr>
            	<td><br>Right Cylinder</td>
            	<td><br>
                	<select id="frctxt" name="frctxt">
  			<option value="-4.00">-4.00</option>
			<option value="-3.50">-3.50</option>
 			<option value="-3.00">-3.00</option>
  			<option value="-2.50">-2.50</option>
 			<option value="-2.00">-2.00</option>
			<option value="-1.50">-1.50</option>
			<option value="-1.00">-1.00</option>
 			<option value="-0.50">-0.50</option>
			<option value="0.00" selected="selected">0.00</option>
 			<option value="0.50">0.50</option>
  			<option value="1.00">1.00</option>
 			<option value="1.50">1.50</option>
			<option value="2.00">2.00</option>
			<option value="2.50">2.50</option>
 			<option value="3.00">3.00</option>
  			<option value="3.50">3.50</option>
 			<option value="4.00">4.00</option>
		</select>
                </td>
            </tr>

	<tr>
            	<td><br>Right Axis</td>
            	<td><br>
                	<select id="fratxt" name="fratxt">
			<option value="0">0°</option>
			<option value="10">10°</option>
 			<option value="20">20°</option>
  			<option value="30">30°</option>
 			<option value="40">40°</option>
			<option value="50">50°</option>
  			<option value="60">60°</option>
 			<option value="70">70°</option>
  			<option value="80">80°</option>
 			<option value="90">90°</option>
			<option value="100">100°</option>
			<option value="110">110°</option>
 			<option value="120">120°</option>
			<option value="130">130°</option>
  			<option value="140">140°</option>
 			<option value="150">150°</option>
  			<option value="160">160°</option>
 			<option value="170">170°</option>
			<option value="180">180°</option>
		</select>
                </td>
            </tr>
	<tr>
            	<td><br>Left Spherical</td>
            	<td><br>
                	<select id="flstxt" name="flstxt">
  			<option value="-4.00">-4.00</option>
			<option value="-3.50">-3.50</option>
 			<option value="-3.00">-3.00</option>
  			<option value="-2.50">-2.50</option>
 			<option value="-2.00">-2.00</option>
			<option value="-1.50">-1.50</option>
			<option value="-1.00">-1.00</option>
 			<option value="-0.50">-0.50</option>
			<option value="0.00" selected="selected">0.00</option>
 			<option value="0.50">0.50</option>
  			<option value="1.00">1.00</option>
 			<option value="1.50">1.50</option>
			<option value="2.00">2.00</option>
			<option value="2.50">2.50</option>
 			<option value="3.00">3.00</option>
  			<option value="3.50">3.50</option>
 			<option value="4.00">4.00</option>
		</select>
                </td>
            </tr>
<tr>
            	<td><br>Left Cylinder</td>
            	<td><br>
                	<select id="flctxt" name="flctxt">
  		<option value="-4.00">-4.00</option>
			<option value="-3.50">-3.50</option>
 			<option value="-3.00">-3.00</option>
  			<option value="-2.50">-2.50</option>
 			<option value="-2.00">-2.00</option>
			<option value="-1.50">-1.50</option>
			<option value="-1.00">-1.00</option>
 			<option value="-0.50">-0.50</option>
			<option value="0.00" selected="selected">0.00</option>
 			<option value="0.50">0.50</option>
  			<option value="1.00">1.00</option>
 			<option value="1.50">1.50</option>
			<option value="2.00">2.00</option>
			<option value="2.50">2.50</option>
 			<option value="3.00">3.00</option>
  			<option value="3.50">3.50</option>
 			<option value="4.00">4.00</option>
		</select>
                </td>
            </tr>

	<tr>
            	<td><br>Left Axis</td>
            	<td><br>
                	<select id="flatxt" name="flatxt">
  			<option value="0">0°</option>
			<option value="10">10°</option>
 			<option value="20">20°</option>
  			<option value="30">30°</option>
 			<option value="40">40°</option>
			<option value="50">50°</option>
  			<option value="60">60°</option>
 			<option value="70">70°</option>
  			<option value="80">80°</option>
 			<option value="90">90°</option>
			<option value="100">100°</option>
			<option value="110">110°</option>
 			<option value="120">120°</option>
			<option value="130">130°</option>
  			<option value="140">140°</option>
 			<option value="150">150°</option>
  			<option value="160">160°</option>
 			<option value="170">170°</option>
			<option value="180">180°</option>
		</select>
                </td>
            </tr>
 <tr>
                <td colspan="2">
			<br><button class="grey" type="submit" name="btn_cancel" value="Cancel" id="button-in">Cancel</button>
                	<button class="grey" type="submit" name="btn_sub" value="Add to Cart" id="button-in">Add to Cart</button><br><br>
                </td>
            </tr>
           
<?php
}else{
?>
<div class="mens"><br></div>
<font size="6">Sunglasses Selection</font><br><br>
<font size="4"><br>You have selected sunglasses.<br> <br>To buy please click on Add To Cart.</font><br><br><br><br>
 <tr>
                <td colspan="2">
			<br><button class="grey" type="submit" name="btn_cancel" value="Cancel" id="button-in">Cancel</button>
                	<button class="grey" type="submit" name="btn_sub" value="Add to Cart" id="button-in">Add to Cart</button><br><br><br><br>
                </td>
            </tr>
<?php 
}
?>
	  </table><br>
    </div>
</form> 

<h2 style="color:#00F;" align="center">
	<?php echo $msg; ?>
</h2> 
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