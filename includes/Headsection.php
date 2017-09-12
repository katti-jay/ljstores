<?php 
include('includes/connect.php');
   if(!isset($_SESSION["user_login"]))
 {
    $username="";
 
 }
 else{
  $username= $_SESSION["user_login"];
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LJstores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/main2.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/php5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	    <script src="js/jquery.js"></script>
	 
<script src="js/countries.js"></script>	
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-mobile"></i> +233 54 7194 251</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> contact@ljstores.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://web.facebook.com/Dressme-africacom-1755255691392672/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
				 
				 
							 
								
							</ul>
							
						</div>
					</div>
					<div class="col-md-4">
					<div class="login-form">
					<form action="searchprod.php" method="POST">
					<div class=" input-group">
					<input type="text" name="prod" placeholder="search" class="form-control input-sm" placeholder="Search... ">
					<div class="input-group-btn" >
					<button class="btn btn-trans btn-sm" type="submit" name="search" style="margin-top:-0px !important; padding:11px;">
					<i class="fa fa-search"></i>
					</button>

					</div>
					</div>

					</form>
				
				</div>
			</div>
					<div class="col-sm-5">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
						
						<?php
						if (!isset($_SESSION["spur_login"]))
	 {
 ?>
		 
		 <li><a href="login.php"><i class="fa fa-lock"></i> Login / Register</a></li>
	<li><a href="contact-us.php">Contact</a></li>		
 
						<?php	} 
 else{
 ?> 
         <li><a href="profile.php"><i class="fa fa-user"></i><?php  echo ucfirst($_SESSION["spur_login"]); ?></a></li>
		 <?php 
		 if($_SESSION['status'] == 1){ ?>
			 <li><a href="add_product.php"><i class="fa fa-plus"></i> List New Item</a></li>
	<?php	 } ?>
		
		<li><a href="contact-us.php">Contact</a></li>
		 <li><a href="logout.php"><i class="fa fa-unlock"></i> Logout</a></li>
<?php } ?>	
						
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"> 
			 
	</header><!--/header-->
<?php 

  

$query = "SELECT * FROM users WHERE id ='$_SESSION[user_id]'";
$result= mysqli_query($conn, $query);
$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
						 
								$user_id			=$row['id'];
								$fname     		=$row['fname'];
								$lname				 =$row['lname'];
								$username          =$row['username'];
								$email				=$row['email'];
								$mobile					=$row['mobile'];
								$country				=$row['country'];
								$region				=$row['region'];
								$profile_pic		=$row['profile_pic'];
							    $user_password		=$row['password'];

 


 ?>
