<?php  
include ('includes/Headsection.php');
include('includes/functions.php');
 
?>
	 
	<section>
	<?php 	 
?>
	 
		<div class="container">
		
		
				<div class="row">
				<div class="col-sm-4" style="color:#4fbfa8; background: rgba(247, 247, 240, 0.49); padding-top:20px;">
						<div class="left_replace">
						<div class="col-sm-4">
						
						<img class="profile-user-img img-responsive " src="images/profile_pics/<?php echo $profile_pic;?>" alt="loreta" style="height:auto; width:100px; box-shadow:0px 1px 1px 1px #9E9E9E; border-radius:4px;">
						<a class="link-black" href="profile.php"><h4 class="profile-username text-center"><?php  echo ucfirst($_SESSION["spur_login"]); ?> </h4></a> 
			 </div>
			 <div class="col-sm-8">
						 
		 
  <div class="blog-post-area pull-left">
				<div class="post-meta">
								<ul>
									<li style="display:block !important;"><i class="fa fa-shopping-cart"></i> 
									Published : <?php 
							$sqlc =mysqli_query($conn, "SELECT * FROM products WHERE user_id_fk ='$_SESSION[user_id]' AND product_status = '1'");
							echo $count_active_porducts = mysqli_num_rows($sqlc); ?>
								 Product<?php if( $count_active_porducts > 1 ||  $count_active_porducts ==0){ ?>s <?php } ?>
					 
									</li> 
										<br><br>
									<li style="display:block !important;"><i class="fa fa-shopping-cart"></i> 
									Pending Products: 
						<?php 
							$sqlc =mysqli_query($conn, "SELECT * FROM products WHERE user_id_fk ='$_SESSION[user_id]' AND product_status = '0'");
							echo $count_active_porducts = mysqli_num_rows($sqlc);
								 
						?> Product<?php if( $count_active_porducts > 1 ||  $count_active_porducts ==0){ ?>s <?php } ?>
									</li>
								<br><br>
								<li style="display:block !important;"><i class="fa fa-times"></i> 
									Banned: 
						<?php 
							$sqlc =mysqli_query($conn, "SELECT * FROM products WHERE user_id_fk ='$_SESSION[user_id]' AND product_status = '2'");
							echo $count_active_porducts = mysqli_num_rows($sqlc);
								 
						?> Product<?php if( $count_active_porducts > 1 ||  $count_active_porducts ==0){ ?>s <?php } ?>
									
									</li>
									
						 
									
								</ul>
								 
							</div>
							</div>
						 
						</div> 
						<div class="blog-post-area pull-left">
				<div class="post-meta">
						 
									<a class="btn btn-sm btn-primary up_pro" style="cursor:pointer;"><i class="fa fa-user"></i> Update Profile</a>
									<a class="btn btn-sm btn-primary up_pass" style="cursor:pointer;"><i class="fa fa-lock"></i> Update Password </a>
									 
								 
								 
							</div>
						 
							</div>
						<div class="clearfix"></div>
						</div> 
						<div class="update_pro" style="display: none; maginn -bottom:20px;">
						
						<div class="signup-form">
					<!--sign up form-->
						<h2>Update Profile!</h2>
						
		
						   <form method="post" role="form" enctype="Multipart/form-data">
							<p><img class="profile-user-img img-responsive " src="images/profile_pics/<?php echo $profile_pic;?>" alt="Matthew" style="height:100px; width:100px;  border-radius:4px;"></p>
							<input type="file" name="image" style="padding-top:10px;" value= "images/profile_pics/<?php echo $profile_pic;?>">
							<input type="text" name="fname" placeholder="First Name" required value="<?php echo $fname;?>">
							<input type="text" name="lname" placeholder="Last Name" required value="<?php echo $lname;?>">
							<input type="text" name="username" placeholder="Username" required value="<?php echo $username;?>">
							<input type="email" name="email" placeholder="Email Address" required value="<?php echo $email;?>">
							<input type="number" name="mobile" placeholder="Phone/Mobile Number"  value="<?php echo $mobile;?>">
							 
							<div class="control-group">
								<select  onchange="print_state('state',this.selectedIndex);" id="country" name ="country"    value="<?php echo $country;?>"> </select> 
							</div><br>
							<div class="control-group">
								<select  name ="region" id ="state"></select>  
								<br>
							</div>
			
			  <br>
							<button type="submit" name="update" class="btn btn-default" >Update</button>
						</form>
						<script language="javascript">print_country("country");</script>
					</div><!--/sign up form-->
						
								
						
						
						</div>
				 
						
			<div class="update_pass" style="display: none; maginn -bottom:20px;">

			<div class="signup-form">
			<h2>Update Password!</h2>


			<form method="post" role="form" enctype="Multipart/form-data">


			<input type="password" name="password" placeholder="Password"   value="">
			<input type="password" name="password2" placeholder="Confirm Password">
			<button type="submit" name="update_pass" class="btn btn-default" >Update Password</button>
			</div>

			</form>

			</div> 
						
					 	
						
						
						 
						<script>
							$('.up_pro').on('click', function(){
							$('.left_replace').hide();
							$('.update_pro').show();
						});
						$('.up_pass').on('click', function(){
							$('.left_replace').hide();
							$('.update_pass').show();
						});
						</script>
				</div>
				
	 
	 
	 <style>
	.left-sidebar h2:before{
		 background:none;
	 }
	 </style>
	 
	  
	
				<div class="col-sm-8 padding-right">
					<div class="features_items">
					<!--features_items-->
					
						<div class="blog-post-area pull-left">
				<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php  echo ucfirst($fname.' '.$lname); ?></li>
									<li><i class="fa fa-phone"></i>  <?php echo $mobile;?></li>
									<li><i class="fa fa-envelope"></i> <?php echo $email;?></li></li>
									<li><i class="fa fa-globe"></i> <?php echo $country.', '.$region;?></li></li>
									
								</ul>
								 
							</div>
							</div>
						<div class="clearfix"></div>
						
<form name="form1" method="post">
	<input type="hidden"  name="productid" />
    <input type="hidden"  name="command" />
</form>
										<?php 
								// `serial`, `category`, `subcategory`, `name`, `description`, `price`, `picture`
								$product_status =1;
								$sql=mysqli_query($conn, "SELECT * FROM products WHERE user_id_fk ='$_SESSION[user_id]' AND product_status='$product_status' ORDER BY date DESC");
								While($row=mysqli_fetch_array($sql))
								{
								    
								$serial=$row['serial'];
								$user_id_fk=$row['serial'];
								$category=$row['category'];
								 
								$name=$row['name'];
								$description=$row['description'];
								$negotiable=$row['negotiable'];
								$price=$row['price'];
								$picture=$row['picture'];
								$date=$row['date'];
									?>						
						<div class="col-sm-4">
						<div class="product-image-wrapper">
							
								<div class="single-products">
								
										<div class="productinfo text-center">
										
										<img src="images/shop/<?php echo $picture; ?>"  alt="<?php echo $name; ?>" style="height: 200px;" />
										<h2>$<?php echo $price; ?></h2>
										<p><?php echo $name; ?> </p>
										
										<?php
									 
										  
												
												if($negotiable == 'No'){ 
												echo'<p style="color:red">Not Negotiable </p>';
												}
												else
												{
												echo '<p style="color:#4fbfa8;">Negotiable</p>';
												}
 
										?>
									 
										<a href="#" class="btn btn-default add-to-cart">
										<i class="fa fa-eye"></i>View Product</a></div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo $price; ?></h2>
											<p><?php echo $description; ?></p>
											 
											<p >
											<a   type="button" class="btn btn-default add-to-cart"  href="product-details.php?view=<?php echo $serial;?>">View Product Details</a></p> 
											  
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<!--li><a href="wishlist.php?view=<?php echo $serial;?>"><i class="fa fa-plus-square"  ></i>Add to wishlist</a></li-->
												</ul>
								</div>
							</div>
							
						</div>
						<?php } ?>
						
					</div>
					<!--features_items-->
					
					
				</div>
	</section>


<?php 
				if(isset($_POST['update'])){           
					$fname = $_POST['fname'];
		     		$lname = $_POST['lname'];
					$username = $_POST['username'];
					$email= $_POST['email'];
					$mobile = $_POST['mobile'];
					$new_country = $_POST['country'];
					$new_state =  $_POST['region'];
					if($new_country ==""){
					$new_country= $country;
					$new_state= $region;
					}
					$image = $_FILES['image']['name'];
					$image_tmp = $_FILES['image']['tmp_name'];
					if($image ==""){
						$image1= $profile_pic;
					 	}
					$date = date('d-m-y');
					$user_status = 0;
					$user_id =$_SESSION['user_id'];
		if($fname=='' or $lname=='' or $username=='' or $mobile=='')
			{
				echo"<script>alert('No field should be left blank');</script>";
				exit();
echo"<script>window.location='';</script>";
			}
		else
			{

			if($image !=""){
				move_uploaded_file($image_tmp,"images/profile_pics/$image");
				}else{
					$image =$image1;
							}
			
				//``id`, `fname`, `lname`, `username`, `email`, `mobile`, `password`, `country`, `region`, `profile_pic`, `user_status`, `signup`
				$update = "UPDATE users SET
				fname='$fname', 
				lname='$lname', 
				username='$username', 
				email='$email', 
				mobile='$mobile',
				country='$new_country',
				region='$new_state',
				profile_pic= '$image',
				user_status= '$user_status'
				 WHERE id = '$user_id'";
						
				if(mysqli_query($update)){

						echo"<script>alert('Profile Updated successfully!'); </script>";
					 	echo"<script>window.location='';</script>";
						
					}
					else
									{
										echo"<script>alert('Profile Update Not successful!'); history.Back();</script>";
								 echo"<script>window.location='';</script>";
									}
			            }
	
	}
	
	
	
		if(isset($_POST['update_pass'])){           
				 		$password = trim($_POST['password']);
						$password2 = $_POST['password2'];
						if($password ==""){
						echo"<script>alert('No field should be left blank');</script>";
						}else
						if($password != $password2){
						echo"<script>alert('Passwords do not Match!'); history.Back();</script>";exit();
						echo"<script>window.location='';</script>";
						}else {
						$password = md5($password);

						$update = "UPDATE users SET password='$password'  WHERE id = '$user_id'";

						if(mysqli_query($update))
						{

						echo"<script>alert('Password Updated successfully!'); </script>";
						echo"<script>window.location='';</script>";

						}
						else
						{
						echo"<script>alert('Password Update Not successful!'); history.Back();</script>";
						echo"<script>window.location='';</script>";
						}
						}
	
	}

?>
<?php 
	include('includes/footer.php')
	?>

					 
				












	
  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
  <style>
  input[type:text], select{
	  border:1px solid #000;
  }
  a {
	   color:#4fbfa8;
  }
  </style>
    