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
	
if($opr=="del")
{
	$del_sql=mysqli_query($con, "DELETE FROM product WHERE pid='$pid1'");
	if($del_sql)
		$msg="1 Record Deleted... !";
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
<div id="content-input">
<form method="post">
    <table border="1" width="75%" align="center" cellpadding="3" cellspacing="0">
	<tr align="center" >
    		<td colspan="8" style="font-size:24px; color:#006;" >View Product</td>
	</tr>
	<tr  align="center"><td></td><td></td><td></td>
         <td  colspan="4" >
        	<input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/>
        	&nbsp;
        	<button class="grey" type="submit" name="btnsearch" value="Search" id="button-search" title="Search Product" >Search</button>        
        </tr>
	<tr>  
      	  <td align="center"  colspan="8">
        	<?php echo $msg; ?>
        </td>
    	</tr>
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
	    <th>Product Type</th>
            <th>Description</th>
	    <th>Category</th>
            <th>Cost </th>
            <th>Image</th>
            <th colspan="2">Operation</th>
        </tr>
        
    <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($con, "SElECT * FROM product WHERE pname like '$key%' or ptype like '$key%' or pcat like '$key%'");
	else
		$sql_sel=mysqli_query($con, "SELECT * FROM product");		
    
	$count=mysqli_num_rows($sql_sel);	
	if($count>0)
	{		
		$i=0;
		while($row=mysqli_fetch_array($sql_sel)){
		$i++;
	    	$color=($i%2==0)?"lightblue":"white";	
    ?>
    	<tr bgcolor="<?php echo $color?>">
            <td align="center"><?php echo $row['pid'];?></td>
            <td align="center"><?php echo $row['pname'];?></td>
	    <td align="center"><?php echo $row['ptype'];?></td>
            <td align="center"><?php echo $row['pdesc'];?></td>
	    <td align="center"><?php echo $row['pcat'];?></td>
            <td align="center"><?php echo $row['pcost'];?></td>
            <td align="center"><img src="<?php echo $row['pimage'];?>" alt="<?php echo $row['pname'];?>"  height="100" width="200"/> </td>
            <td align="center">
	<a href="viewprod.php?aid=<?php echo $aid;?>&opr=del&pid=<?php echo $row['pid'];?>" title="Delete"><img src="picture/delete.png" /></a>
           </td>
           <td  align="center">
	<a href="insertprod.php?aid=<?php echo $aid;?>&opr=edit&pid=<?php echo $row['pid'];?>" title="Update"><img src="picture/update.png" /></a>
            </td>
             
        </tr>
       
    <?php	
    		}//end of while
	}//end of if
	else
	{
    ?>
	<tr>
            <td colspan="6" align='center'><h2 >No Records To Display</h2></td>
        </tr>
    <?php  
	}	
    ?>
</table>
<a href="adminprofile.php?aid=<?php echo $aid;?>">Back to profile</a>
</form>
</div>
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