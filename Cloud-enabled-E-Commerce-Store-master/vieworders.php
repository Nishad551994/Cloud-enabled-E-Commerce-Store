<?php
	//session_start();	
	$con = mysqli_connect("localhost","root","") or die("No Connection");
	mysqli_select_db($con, 'sabistore') or die("No Database name");

	$msg="";
	$opr="";
	$pid1="";
	$aid="";
	$cid1="";
	$aid="";

	if(isset($_GET['aid']))	
		$aid=$_GET['aid'];
		
	if(isset($_GET['opr']))
		$opr=$_GET['opr'];
		
	if(isset($_GET['pid']))
		$pid1=$_GET['pid'];
		
	if($opr=="del")
	{
		$del_sql=mysqli_query($con, "DELETE FROM products WHERE pid='$pid1'");
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
                <div>
                    <ol class="breadcrumb">                       
                        <li><h2>View Orders</h2></li>
                    </ol>
                </div>
                <!-- /.div -->
				 <div class="row">
					<!--Sub content Elements-->    
					<div class="col-md-12">
						<form method="post">
							<table border="1" width="75%" align="center" cellpadding="3" cellspacing="0">
							<tr align="center" >
								<td colspan="9" style="font-size:24px; color:#006;" >View Orders</td>
							</tr>

							<tr>  
								<td align="center"  colspan="9">
									<?php echo $msg; ?>
								</td>
							</tr>
							<tr align="center">
								<th>Customer ID</th>
								<th>Customer Name</th>
								<th>Email ID</th>
								<th>Order ID</th>
								<th>Order Date</th>
								<th>Bill ID</th>
								<th>Bill Date</th>
								<th>Amount</th>
								<th>Operation</th>
							</tr>								
							<?php
							
                            $sql_sel=mysqli_query($con, "select c.*,o.*,b.* from customer c, orders o,bill b where c.cid=o.cid and o.oid=b.oid");							
							
							$count=mysqli_num_rows($sql_sel);	
							if($count>0)
							{		
								$i=0;
								while($row=mysqli_fetch_array($sql_sel))
								{
								$i++;
								$color=($i%2==0)?"lightblue":"white";	
								//pid	pname	catid	pdesc	pprice	qty	 pimage
							?>
								<tr bgcolor="<?php echo $color?>">
								<td align="center"><?php echo $row[0];?></td>
								<td align="center"><?php echo $row[1];?></td>
								<td align="center"><?php echo $row[4];?></td>
								<td align="center"><?php echo $row[9];?></td>
								<td align="center"><?php echo $row[11];?></td>
								<td align="center"><?php echo $row[12];?></td>
								<td align="center"><?php echo $row[13];?></td>
								<td align="center"><?php echo $row[15];?></td>
								<td align="center"><a href="vieworders.php?opr=del&cid=<?php echo $row['cid'];?>" title="Delete"><img src="picture/delete.png" /></a></td>
																 
							</tr>							   
							<?php	
								}//end of while
							}//end of if
							else
							{
							?>
							<tr>
								<td colspan="9" align='center'><h2 >No Records To Display</h2></td>
							</tr>
							<?php  
							}	
							?>
						</table>
						<a href="admin_profile.php?aid=<?php echo $aid;?>">Back to profile</a>
					</form>
							
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
