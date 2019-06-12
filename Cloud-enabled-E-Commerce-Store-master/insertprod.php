<?php
//session_start();	
$con = mysqli_connect("localhost","root","") or die("No Connection");
mysqli_select_db($con, 'sabistore') or die("No Database name");

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
$sql=mysqli_query($con, "select max(cast(right(pid,length(pid)-1)as signed)) from products");
$row=mysqli_fetch_row($sql);
$pid='P'.($row[0]+1);
//echo "Product id=",$pid;

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
	//pid	pname	catid	pdesc	pprice	qty	 pimage
	$pid=$_POST['pidtxt'];
	$pname=$_POST['pnametxt'];
	$catid=$_POST['catidtxt'];	
	$pdesc=$_POST['pdesctxt'];
	$pprice=$_POST['ppricetxt'];
	$qty=$_POST['qtytxt'];	
	$pimage=$target_path;

	$sql_ins=mysqli_query($con, "INSERT INTO products VALUES('$pid','$pname','$catid','$pdesc','$pprice',$qty,'$pimage')");

	if($sql_ins==true)
	{			
		$msg="1 Product Inserted";
		$sql=mysqli_query($con, "select max(cast(right(pid,length(pid)-1)as signed)) from products");
		$row=mysqli_fetch_row($sql);
		$pid='P'.($row[0]+1);
		//echo "Product id=",$pid;
		//header("location: admin_profile.php?aid=$aid");
	}
	else
	{
		$msg="Insert Error:".mysqli_error($con);	
	}
}

//------------------update data----------
if(isset($_POST['btn_upd']))
{
	$pid=$_POST['pidtxt'];
	$pname=$_POST['pnametxt'];
	$catid=$_POST['catidtxt'];	
	$pdesc=$_POST['pdesctxt'];
	$pprice=$_POST['ppricetxt'];
	$qty=$_POST['qtytxt'];	
	//$pimage=$_POST['pimagetxt'];	
	
	$sql_update=mysqli_query($con, "UPDATE products set pname='$pname',catid='$catid',pdesc='$pdesc',pprice='$pprice',qty=$qty where pid='$pid'");
	//$sql_update=mysqli_query($con, "UPDATE products set pname='$pname',pdesc='$pdesc',pprice='$pprice',qty=$qty where pid='$pid'");
	
	if($sql_update==true)
	{
		$msg="1 Product Updated";
		//header("location: admin_profile.php?aid=$aid");
		header("location: viewprod.php?aid=$aid");			
	}
	else
	{
		$msg="Update Fail".mysqli_error();
	}
}
//------------------update cancel----------	
	if(isset($_POST['btn_updcnl']))
	{
		header("location: viewprod.php?aid=$aid");
	}
//------------------add cancel----------	
	if(isset($_POST['btn_subcnl']))
	{
		header("location: admin_profile.php?aid=$aid");
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
						if ($aid!="NA")
						{
							echo "<li><a href='admin_profile.php?cid=$aid'>Dashboard</a></li>";
							echo "<li><a href='adminlogin.php'>Logout</a></li>";
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
				<?php
				if($opr=="edit")
				{
					//echo "<h1>cid=",$cid1,"</h1>";
					$sql=mysqli_query($con, "SELECT * FROM products WHERE pid='$pid1'");						
					$rs_upd=mysqli_fetch_array($sql);
					//echo "SELECT * FROM products WHERE pid='$pid1'";
				?>
                <div>
                    <ol class="breadcrumb">                       
                        <li><h2>Edit Product</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
				 <div class="row">
					<!--Sub content Elements-->    
					<div class="col-md-9">					
						<form method="post" enctype="multipart/form-data">
						<table border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td>Product Id :</td>
						<td>
						<input type="text" name="pidtxt" id="textbox" value="<?php echo $rs_upd['pid'];?>" readonly/>
						</td>
						</tr>
						<tr>
						<td>Product Name :</td>
						<td>
							<input type="text" name="pnametxt" id="textbox" value="<?php echo $rs_upd['pname'];?>"/>
						</td>
						</tr>
						<tr>
						<td>Category :</td>
						<td>
						<select id="catidtxt" name="catidtxt" size="1">
						<?php
							$sql_cat=mysqli_query($con, "SELECT * FROM category");						
							//$catrow=mysqli_fetch_array($cat_sql);
							$count=mysqli_num_rows($sql_cat);	
							if($count>0)
							{	
								while($rowcat=mysqli_fetch_array($sql_cat))
								{
									if($rs_upd['catid']==$rowcat['catid'])
										echo "<option value=",$rowcat['catid']," selected>",$rowcat['catname'],"</option>";
									else
										echo "<option value=",$rowcat['catid'],">",$rowcat['catname'],"</option>";
								}
							}						
						?>
						</select>
						</td>
						</tr>
						<!--<tr>
						<td>Category :</td>
						<td>
						<?php //echo $rs_upd['catid'];?>
						</td>
						</tr>-->
						<tr>
						<td>Description :</td>
						<td>
							<input type="text" name="pdesctxt" id="textbox" value="<?php echo $rs_upd['pdesc'];?>"/>      
						</td>
						</tr>
						<tr>
							<td>Price :</td>
							<td>
								<input type="text" name="ppricetxt" id="textbox" value="<?php echo $rs_upd['pprice'];?>"/>
							</td>
						</tr>
						<tr>
							<td>Quantity :</td>
							<td>
								<input type="text" name="qtytxt" id="textbox" value="<?php echo $rs_upd['qty'];?>"/>
							</td>
						</tr>
						<tr>
						<td>Image :</td>
						<td>
							<img src="<?php echo $rs_upd['pimage'];?>" height="150" width="200"/>
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
					</div>
				</div>
				<?php	
				}
				else
				{
				?>
				<div>
                    <ol class="breadcrumb">                       
                        <li><h2>Insert Product</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
				 <div class="row">
					<!--Sub content Elements-->    
					<div class="col-md-9">
					<form method="post" enctype="multipart/form-data">
					<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td>Product Id :</td>
						<td>
							<input type="text" name="pidtxt" id="textbox" value="<?php echo $pid;?>" readonly />
						</td>
					</tr>
					<tr>
						<td>Product Name :</td>
						<td>
							<input type="text" name="pnametxt" id="textbox" />
						</td>
					</tr>
					<tr><td>Category :</td>
						<td>
						<select id="catidtxt" name="catidtxt" size="1">
						<?php
							$sql_cat=mysqli_query($con, "SELECT * FROM category");						
							//$catrow=mysqli_fetch_array($cat_sql);
							$count=mysqli_num_rows($sql_cat);	
							if($count>0)
							{	
								while($rowcat=mysqli_fetch_array($sql_cat))
								{
									echo "<option value=",$rowcat['catid'],">",$rowcat['catname'],"</option>";
								}
							}						
						?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Description :</td>
						<td>
							<input type="text" name="pdesctxt" id="textbox" />
						</td>
					</tr>
					<tr>
						<td>Price :</td>
						<td>
							<input type="text" name="ppricetxt" id="textbox" />
						</td>
					</tr>
					<tr>
						<td>Quantity :</td>
						<td>
							<input type="text" name="qtytxt" id="textbox" />
						</td>
					</tr>
					<tr>
						<td>Image :</td>
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
					</table>
					</form><br><br>
					</div>
				</div>
					<?php
					}
					?>										
					</div>
				</div>
			<!--</div>-->
		</div>
		 <div class="row">
			<h2 style="color:#00F;" align="center">
				<?php echo $msg; ?>
			</h2>
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
