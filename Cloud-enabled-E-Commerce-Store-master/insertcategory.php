<?php
//session_start();	
$con = mysqli_connect("localhost","root","") or die("No Connection");
mysqli_select_db($con, 'sabistore') or die("No Database name");

$msg="";
$opr="";
$catid1="";
$aid="";
$cid1="";

if(isset($_GET['aid']))	
	$aid=$_GET['aid'];

if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['catid']))	
	$catid1=$_GET['catid'];

//--------------add data-----------------

//autogen code
$sql=mysqli_query($con, "select max(cast(right(catid,length(catid)-3)as signed)) from category");
$row=mysqli_fetch_row($sql);
$catid='CAT'.($row[0]+1);
//echo "CAT id=",$catid;

if(isset($_POST['btn_sub']))
{	
	$catid=$_POST['catidtxt'];
	$catname=$_POST['catnametxt'];

	$sql_ins=mysqli_query($con, "INSERT INTO category VALUES('$catid','$catname')");

	if($sql_ins==true)
	{			
		$msg="1 Category Inserted";
		$sql=mysqli_query($con, "select max(cast(right(catid,length(catid)-3)as signed)) from category");
		$row=mysqli_fetch_row($sql);
		$catid='CAT'.($row[0]+1);
		//$msg="";
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
	$catid=$_POST['catidtxt'];
	$catname=$_POST['catnametxt'];

	$sql_update=mysqli_query($con, "UPDATE category set catname='$catname' where catid='$catid'");
	
	if($sql_update==true)
	{
		$msg="1 Category Updated";
		//header("location: admin_profile.php?aid=$aid");
		header("location: viewcategory.php?aid=$aid");		
	}
	else
	{
		$msg="Update Fail".mysqli_error();
	}
}
//------------------update cancel----------	
	if(isset($_POST['btn_updcnl']))
	{
		header("location: admin_profile.php?aid=$aid");
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
					$sql=mysqli_query($con, "SELECT * FROM category WHERE catid='$catid1'");						
					$rs_upd=mysqli_fetch_array($sql);
				?>
                <div>
                    <ol class="breadcrumb">                       
                        <li><h2>Edit Category</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
				 <div class="row">
					<!--Sub content Elements-->    
					<div class="col-md-9">					
						<form method="post" enctype="multipart/form-data">
						<table border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td>Category Id :</td>
						<td>
						<input type="text" name="catidtxt" id="textbox" value="<?php echo $rs_upd['catid'];?>" readonly/>
						</td>
						</tr>
						<tr>
						<td>Category Name :</td>
						<td>
							<input type="text" name="catnametxt" id="textbox" value="<?php echo $rs_upd['catname'];?>"/>
						</td>
						</tr>
						<tr>
						<td colspan="2">
							<button class="grey" type="submit" name="btn_updcnl" value="Cancel" id="button-in">Cancel</button>
							<button class="grey" type="submit" name="btn_upd" value="Update" id="button-in">Update</button>
						</td>
						</tr>
					</table>
					</form><br><br><br><br>
					</div>
				</div>
				<?php	
				}
				else
				{
				?>
				<div>
                    <ol class="breadcrumb">                       
                        <li><h2>Insert Category</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
				 <div class="row">
					<!--Sub content Elements-->    
					<div class="col-md-9">
					<form method="post" enctype="multipart/form-data">
					<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td>Category Id :</td>
						<td>
							<input type="text" name="catidtxt" id="textbox" value="<?php echo $catid;?>" readonly />
						</td>
					</tr>
					<tr>
						<td>Category Name :</td>
						<td>
							<input type="text" name="catnametxt" id="textbox" />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<br><button class="grey" type="submit" name="btn_subcnl" value="Cancel" id="button-in">Cancel</button>
							<button class="grey" type="submit" name="btn_sub" value="Insert" id="button-in">Insert</button><br>
						</td>
					</tr>
					</table>
					</form><br><br><br><br>
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
