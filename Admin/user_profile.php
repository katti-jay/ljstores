<?php  
include ('includes/Headsection.php');
?>
	 <?php 
if(isset($_GET['edit'])){
$query = mysqli_query($connection, "SELECT * FROM  users  WHERE id ='$_GET[edit]'");
 
$row 				=mysqli_fetch_array($query);
$user_id			=$row['id'];
$fname     		=$row['fname'];
$lname				=$row['lname'];
$username        =$row['username'];
$email				=$row['email'];
$mobile				=$row['mobile'];
$country			=$row['country'];
$region				=$row['region'];
$profile_pic		=$row['profile_pic'];
$user_password	=$row['password'];
$user_status		=$row['user_status'];

}
?>
	<section>
	  
		<div class="container">
<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active"><?php  echo ucfirst($fname.' '.$lname); ?></li>
				</ol>
			</div>
				 
							<div class="clearfix"></div>
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
				<div class="col-sm-4 " style="color:#4fbfa8; background: rgba(249, 249, 249, 0.56); padding-top:20px;">
				 
						<div class="left_replace">
						<div class="col-sm-4">
					 		<img class="profile-user-img img-responsive pu" src="../images/profile_pics/<?php echo $profile_pic;?>" alt="" style="height:auto; width:100px; box-shadow:0px 1px 1px 1px #9E9E9E; 	border-radius:4px;">
				 </div> 
			  <div class="col-sm-8">
			  <div class="blog-post-area pull-left">
				<div class="post-meta">
								<ul>
									<li style="display:block !important;"><i class="fa fa-shopping-cart"></i> 
									Published : <?php 
							$sqlc =mysqli_query($connection, "SELECT * FROM products WHERE user_id_fk ='$_GET[edit]' AND product_status = '1'");
							echo $count_active_porducts = mysqli_num_rows($sqlc); ?>
								 Product<?php if( $count_active_porducts > 1 ||  $count_active_porducts ==0){ ?>s <?php } ?>
					 
									</li> 
										<br><br>
									<li style="display:block !important;"><i class="fa fa-shopping-cart"></i> 
									Pending Products: 
						<?php 
							$sqlc =mysqli_query($connection, "SELECT * FROM products WHERE user_id_fk ='$_GET[edit]' AND product_status = '0'");
							echo $count_active_porducts = mysqli_num_rows($sqlc);
								 
						?> Product<?php if( $count_active_porducts > 1 ||  $count_active_porducts ==0){ ?>s <?php } ?>
									</li>
								<br><br>
								<li style="display:block !important;"><i class="fa fa-times"></i> 
									Banned: 
						<?php 
							$sqlc =mysqli_query($connection, "SELECT * FROM products WHERE user_id_fk ='$_GET[edit]' AND product_status = '2'");
							echo $count_active_porducts = mysqli_num_rows($sqlc);
								 
						?> Product<?php if( $count_active_porducts > 1 ||  $count_active_porducts ==0){ ?>s <?php } ?>
									
									</li>
									
						 
									
								</ul>
								 
							</div>
							</div>
						 
					
						<div class="show_opt"><!--category-tab-->
			<form name="up_product_stat" method="Post" action="#">
		 
				 
					<select name="opt_data" value="" class="opt_data">
					<option value="choose">Change user status</option>
 <?php
 
 	if($user_status == 0){ ?>
		<option value="1">Activate User </option>
		<option value="2">Delete User</option>
											<?php	}
										if($user_status == 1){
												?>
		<option value="0">Suspend User</option>
		<option value="2">Delete User</option>
									<?php	}
										if($user_status == 2) {
									?>
		<option value="1">Activate User  </option>
		<option value="0">Suspend User</option>
									<?php	}
 
 ?>
						
							  
							
					 
						</select>
							<br>
							<br>
							<button type="submit" class=" btn btn-sm btn-default cart pull-left">Submit</button> 
							<br>
							</form>
							
							
							<?php 
							if(isset($_POST['opt_data'])){
								echo $new_user_status =$_POST['opt_data'];
								if($new_user_status =='choose'){
									echo "<script>alert('Please Choose a Status');</script>";	exit();
								}	
								
								if($new_user_status == 2){
									$query_del = mysqli_query("DELETE FROM users  WHERE id ='$_GET[edit]' ");
								if($query_del){
									
									$query_del2 = mysqli_query("DELETE FROM products  WHERE user_id_fk ='$_GET[edit]' ");
									if($query_del2 ){
											echo "<script>alert('User Deleted Succefully');</script>";
									echo "<script>window.location='';</script>";
									exit();
									}
								
								}
									
								}else{
									
									$query_up = mysqli_query("UPDATE users SET user_status ='$new_user_status' WHERE id ='$_GET[edit]' ");
									if($query_up ){
									echo "<script>window.location='';</script>";
									exit();
								}
									
								}
								
							}
							
							?>
					</div>	
					
	</div> 
					 
				
						 






						</div> 
						</div> 
						
		 
	 
	
				<div class="col-sm-8 padding-right">
					<div class="features_items">
					 <?php 
							 
								$product_status =1;
								$sql=mysqli_query($connection, "SELECT * FROM products WHERE user_id_fk ='$_GET[edit]' ORDER BY date DESC");
								While($row=mysqli_fetch_array($sql))
								{
								    
								$serial					=$row['serial'];
								$user_id_fk			=$row['serial'];
								$category				=$row['category'];
								$product_status		=$row['product_status'];
								
								 	if($product_status == 0){ 
												$product_status_en = '<span style="color:yellow;"><i class="fa fa-signal"></i> Pending</span>';
												}
										if($product_status == 1){
												$product_status_en = '<span style="color:green;"><i class="fa fa-check"></i> Active</span>';
										}
										if($product_status == 2) {
												$product_status_en = '<span style="color:red;"><i class="fa fa-times"></i> Banned</span>';
										}
 
									 
								
								$name					=$row['name'];
								$description			=$row['description'];
								$negotiable			=$row['negotiable'];
								$price					=$row['price'];
								$picture				=$row['picture'];
								$date					=$row['date'];
					?>						
						<div class="col-sm-4">
						<div class="product-image-wrapper">
							
								<div class="single-products">
								
										<div class="productinfo text-center">
										
										<img src="../images/shop/<?php echo $picture; ?>"  alt="<?php echo $name; ?>" style="height: auto;" />
										<h2>$<?php echo $price; ?></h2>
										<p><?php echo $name; ?> </p>
										
										<?php
									 	if($negotiable == 'No'){ 
											echo'<p style="color:red">Not Negotiable </p>';
												}
											else{
												echo '<p style="color:#4fbfa8;">Negotiable</p>';
										}
 
										?>
									 
									
									<?php echo $product_status_en; ?>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo $price; ?></h2>
											<p><?php echo $description; ?></p>
											 <p><a  type="button" class="btn btn-default add-to-cart"  href="product-details.php?view=<?php echo $serial;?>">View Product Details</a></p> 
											  
										</div>
									</div>
								</div>
								<div class="choose">
									 
								</div>
							</div>
							
						</div>
						<?php } ?>
						
					</div>
					<!--features_items-->
					
					
				</div>
	</section>


<?php 
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

						if(mysql_query($update))
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

