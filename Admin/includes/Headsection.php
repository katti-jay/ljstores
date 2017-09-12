<?php 
  session_start();
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
    <title>Admin || Ljstores</title>
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
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	
    


    
	
</head><!--/head-->

<body>


	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-mobile"></i> +233 24 5237 219</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@ljstores.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
								<?php
	if(!isset($_SESSION["spur_login2"]))
 {
 
	  // echo "<script> window.location='login.php'</script>";

    }
 else{
  $username= $_SESSION["spur_login2"];
 echo "<div style='margin-left:100px; padding:5px; color:#4fbfa8; '><h4>Hello, $username</h4></div>";
 }
 ?>
					 
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
				 
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
						
							 
						<?php
						if (isset($_SESSION["spur_login2"])){ ?>
						<li><a href="../index.php"><i class="fa fa-shorping-cart"></i> Go to Lj-store </a></li>
						<li><a href="messages.php">Messages <?php 
							$sqlc =mysqli_query($connection, "SELECT * FROM contact WHERE msg_status ='0' ");
						echo	  $count_msg = mysqli_num_rows($sqlc); ?></a></li>
						
						
 
 <li><a href="logout.php"><i class="fa fa-unlock"></i> Logout </a></li>
					<?php		} 
 ?>	
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						 
					</div>