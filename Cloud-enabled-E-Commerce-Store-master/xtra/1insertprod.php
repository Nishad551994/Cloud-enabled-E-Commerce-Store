<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'sabistore') or die('No Database name');

$msg="";
$opr="";
$pid1="";
$aid="";

if(isset($_GET['aid']))	
	$aid=$_GET['aid'];

if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['pid']))	
	$pid1=$_GET['pid'];

	
//--------------add data-----------------

//autogen code
$sql=mysqli_query($con, "select max(cast(right(pid,length(pid)-1)as signed)) from product");
$row=mysqli_fetch_row($sql);
//echo "Prduct id=",$row[0];
$pid='P'.($row[0]+1);
//}
if(isset($_POST['btn_sub']))
{

	$target_path = "images/";

	$target_path = $target_path.basename($_FILES['uploadedfile']['name']); 

	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
	{
    		$msg="The file ".basename( $_FILES['uploadedfile']['name'])." has been uploaded";
	}
	else
	{
    		$msg="There was an error uploading the file, please try again!";
	}

	$pid=$_POST['pidtxt'];
	$pname=$_POST['pnametxt'];
	$ptype=$_POST['ptypetxt'];	
	$pdesc=$_POST['pdesctxt'];
	$pcat=$_POST['pcattxt'];
	$cost=$_POST['costtxt'];	
	$pimage=$target_path;

$sql_ins=mysqli_query($con, "INSERT INTO product VALUES('$pid','$pname','$ptype','$pdesc','$pcat',$cost,'$pimage')");

if($sql_ins==true)
{
		
	header("location: adminprofile.php?aid=$aid");

}
else
	$msg="Insert Error:".mysqli_error($con);	

}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	
	$pid=$_POST['pidtxt'];
	$pname=$_POST['pnametxt'];
	$ptype=$_POST['ptypetxt'];	
	$pdesc=$_POST['pdesctxt'];
	$pcat=$_POST['pcattxt'];
	$cost=$_POST['costtxt'];
	$pimage=$_POST['pimagetxt'];	
	

	$sql_update=mysqli_query($con, "UPDATE product set pname='$pname',ptype='$ptype',pdesc='$pdesc',pcat='$pcat',pcost=$cost,pimage='$pimage' where pid='$pid'");
	
	if($sql_update==true)
		header("location: adminprofile.php?aid=$aid");		
	else
		$msg="Update Fail".mysqli_error();
	}
//------------------uodate cancel----------	
	if(isset($_POST['btn_updcnl']))
	{
		header("location: adminprofile.php?aid=$aid");
	}
//------------------add cancel----------	
	if(isset($_POST['btn_subcnl']))
	{
		header("location: adminprofile.php?aid=$aid");
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
<?php
if($opr=="edit")
{
	//echo "<h1>cid=",$cid1,"</h1>";
	$sql=mysqli_query($con, "SELECT * FROM product WHERE pid='$pid1'");						
	$rs_upd=mysqli_fetch_array($sql);
	//echo $rs_upd['cid'];

?>
<form method="post" enctype="multipart/form-data">
 <div class="mens">   <div>
<font size="6" color="#006">Edit Product</font>
   	  <table border="0" cellpadding="4" cellspacing="0">
	      <tr>
            	<td><br>Product Id:</td>
            	<td><br>
                	<input type="text" name="pidtxt" id="textbox" value="<?php echo $rs_upd['pid'];?>" readonly/>
                </td>
            </tr>
        	<tr>
            	<td>Product Name:</td>
            	<td>
                	<input type="text" name="pnametxt" id="textbox" value="<?php echo $rs_upd['pname'];?>"/>
                </td>
            </tr>
	</tr>
        	<tr>
            	<td>Product Type:</td>
            	<td>
                <?php echo $rs_upd['ptype'];?>
                </td>
            </tr>
            <tr>
            	<td>Description:</td>
            	<td>
			<input type="text" name="pdesctxt" id="textbox" value="<?php echo $rs_upd['pdesc'];?>"/>      
		</td>
            </tr>
<tr>
<td>Category</td>
<td>
<?php echo $rs_upd['pcat'];?>
</td>
</tr>
		<tr>
            	<td>Cost:</td>
            	<td>
                	<input type="text" name="costtxt" id="textbox" value="<?php echo $rs_upd['pcost'];?>"/>
                </td>
            </tr>
	    <tr>
            	<td>Image:</td>
            	<td>
			<img src="<?php echo $rs_upd['pimage'];?>" height="150" width="200"/>
                </td>
            </tr>
	    <tr>
                <td colspan="2">
                	<br><button class="grey" type="submit" name="btn_updcnl" value="Cancel" id="button-in">Cancel</button>
                	<button class="grey" type="submit" name="btn_upd" value="Update" id="button-in">Update</button>
                </td>
            </tr>
	  </table>
<br>
    </div>
</form> 
<?php	
}
else
{
?>
<form method="post" enctype="multipart/form-data">
<div class="mens">
<font size="6" color="#006">Insert Product</font>
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
	      <tr><br>
            	<td>Product Id:</td>
            	<td>
                	<input type="text" name="pidtxt" id="textbox" value="<?php echo $pid;?>" readonly />
                </td>
            </tr>
        	<tr>
            	<td>Product Name:</td>
            	<td>
                	<input type="text" name="pnametxt" id="textbox" />
                </td>
            </tr>
	<tr><td>Product Type</td><td>
<select id="ptypetxt" name="ptypetxt">
  			<option value="Eyeglasses">Eyeglasses</option>
 			<option value="Lens">Lens</option>
			<option value="Sunglasses">Sunglasses</option>
		</select></td></tr>
            <tr>
            	<td>Description:</td>
            	<td>
			<input type="text" name="pdesctxt" id="textbox" />
    		</td>
            </tr>
		<tr><td>Category</td><td>
<select id="pcattxt" name="pcattxt">
  			<option value="Men">Men</option>
 			<option value="Women">Women</option>
		</select></td></tr>
	    <tr>
            	<td>Cost:</td>
            	<td>
                	<input type="text" name="costtxt" id="textbox" />
                </td>
            </tr>
	    <tr>
            	<td>Image:</td>
            	<td>
                	<input type="file" name="uploadedfile" size="50" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                	<br><button class="grey" type="submit" name="btn_subcnl" value="Cancel" id="button-in">Cancel</button>
                	<button class="grey" type="submit" name="btn_sub" value="Insert" id="button-in">Insert</button><br>
                </td>
            </tr>
	  </table><br><br><br><br>
    </div>
</form> 
<?php
}
?>
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