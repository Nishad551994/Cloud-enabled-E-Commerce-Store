<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'optic') or die('No Database name');


$cid="";

if(isset($_GET['cid']))	
	$cid=$_GET['cid'];
else
	$cid="NA";

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Optic House</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
</head>
<body>
      <div class="header-top">
			<div class="wrap"> 
			  <div class="header-top-left">
			  	   
   				    <div class="clear"></div>
   			 </div>
			 <div class="cssmenu">
				<ul>
					<li><a href="contactus.php?cid=<?php echo $cid ?>">Contact Us</a></li> |
					
					<?php
if($cid=="NA")
{
?>
<li><a href="login.php">Log In</a></li> |
<li><a href="register.php">Sign Up</a></li>
<?php 
}
else
{
?>
<li><a href="viewcart.php?cid=<?php echo $cid;?>">View Cart</a></li> |
<li><a href="register2.php?cid=<?php echo $cid;?>">Profile</a></li> |
<li><a href="logout.php">Logout</a></li>
<?php 
}
?>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="index.php?cid=<?php echo $cid;?>"><img src="images/logo1.png" alt=""/></a>
				</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
			<li class="active grid"><a href="index.php?cid=<?php echo $cid;?>"><font size="4">Home</font></a></li>
			<li><a class="color5" href="#"><font size="4">women</font></a>
				<div class="megapanel">
					<div class="col1">
						<div class="col1">
							<div class="h_nav">
								<a href="womens.php?cid=<?php echo $cid;?>"><h4>Glasses</h4></a>	
							</div>						

	
						</div>
						<div class="col1">
							<div class="h_nav">
								<a href="womenslens.php?cid=<?php echo $cid;?>"><h4>Lens</h4></a>	
							</div>						

	
						</div>
						<div class="col1">
							<div class="h_nav">
								<a href="womenssun.php?cid=<?php echo $cid;?>"><h4>Sun Glasses</h4></a>
							</div>						

						
						</div>
					  </div>
					</div>
				</li>				
				<li><a class="color5" href="#"><font size="4">Men</font></a>
					<div class="megapanel">
						<div class="col1">
							<div class="h_nav">
								<a href="mens.php?cid=<?php echo $cid;?>"><h4>Glasses</h4></a> 							</div>						

	
						</div>
						<div class="col1">
							<div class="h_nav">
							       <a href="menslens.php?cid=<?php echo $cid;?>"><h4>Lens</h4></a>
							</div>						

	
						</div>
						<div class="col1">
							<div class="h_nav">
								<a href="menssun.php?cid=<?php echo $cid;?>"><h4>Sun Glasses</h4></a>
							</div>						

						
						</div>
					</div>
				</li>
				<li><a class="color6" href="aboutus.php?cid=<?php echo $cid ; 
?>"><font size="4">About Us</font></a></li>
			</ul>
			</div>
		</div>
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
		<?php }?>
	  </div>
     <div class="clear"></div>
     </div>
	</div>
<div class="mens">    
  <div class="main">
     <div class="wrap">
		
		  	<h2 class="head">TERMS AND CONDITIONS</h2>
	<form>
        <p>
	<font size="4"><b>FREE STANDARD SHIPPING</b></font>
<br>
You heard right, Optic House gives free expedite shipping on every order we fill. With our free expedite shipping your glasses will arrive at your door within 3-5 days from when you place your order.<br>
<br>
<font size="4"><b>COURIERS</b></font>
<br>We process all deliveries through trusted courier services.<br>
<br>
<font size="4"><b>NO HIDDEN CHARGES</b></font><br>
There are no extra taxes, hidden costs or additional shipping charges. The price mentioned on the website is the final price. What you see is what you pay. Our prices are all inclusive. All taxes are included with the list prices.<br>
<br>
<font size="4"><b>INSURANCE</b></font>
<br>All products are insured against theft and damages incurred during transit. If you receive a package that is open or looks to have been tampered with please do not accept it. Contact us at 022-28974546<br>
	</p>
	</form>	
				<div class="clear"></div>
					 							 			    
		  </div>
			<br>
			<br>
			<div class="clear"></div>
			</div>
		   </div>
		</div>
		<script src="js/jquery.easydropdown.js"></script>
	<div class="footer">
		<div class="footer-top">
			<div class="wrap">
			  <div class="section group example">
				<div class="col_1_of_2 span_1_of_2">
					<ul class="f-list">
						  <li><img src="images/2.png"><span class="f-text">Free Shipping of orders</span><div class="clear"></div></li>
					</ul>
				</div>
				<div class="col_1_of_2 span_1_of_2">
					<ul class="f-list">
					  <li><img src="images/3.png"><span class="f-text">Call us on 022-28974546 </span><div class="clear"></div></li>
					</ul>
				</div>
				<div class="clear"></div>
		      </div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="wrap">
	                <div class="copy">
			           <p>© 2016 Brian & Shruti Solutions</p>
		            </div>
		       <div class="f-list2">
				<ul>
					<li class="active"><a href="aboutus.php?cid=<?php echo $cid;?>">About Us</a></li> |
					
					<li><a href="terms.php?cid=<?php echo $cid ?>">Terms & Conditions</a></li> |
					<li><a href="contactus.php?cid=<?php echo $cid ?>">Contact Us</a></li> 
				</ul>
			  </div>
				<div class="clear"></div>
		      </div>
			</div>
		</div>
</body>
</html>