<?php  
include ('includes/Headsection.php');
include('includes/functions.php');

if(isset($_POST['command'])=='add' && isset($_POST['productid'])>0){
		$pid = $_REQUEST['productid'];
		addtocart($pid,1);
		header("location:cart.php");
		exit();
	}
	
?>

						
<form name="form1" method="post">
	<input type="hidden"  name="productid" />
    <input type="hidden"  name="command" />
</form>
				
	<section>
		<div class="container">
			<div class="row">
				<?php include('includes/category.php')?>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
							<?php
								 if(isset($_GET['view'])){
							
							 	 $edit_id = $_GET['view'];
							     $_SESSION['review'] = $_GET['view'];
								$query = mysqli_query("SELECT * FROM products as p LEFT JOIN users as  u ON(p.user_id_fk = u.id) WHERE p.serial ='$edit_id' LIMIT 1");
 
								 $row =mysqli_fetch_array($query);
							 	$serial		=$row['serial'];
								$category     		=$row['category'];
						 
								$name          	=$row['name'];
								$description		=$row['description'];
								$negotiable		=$row['negotiable'];
								$price				=$row['price'];
								$picture			=$row['picture'];
								$date				=$row['date'];
								$owner_id			=$row['user_id_fk'];
								$owner 			=$row['fname'].' '.$row['lname'];
								$username		=$row['username'];
								$email				=$row['email'];
								$mobile				=$row['mobile'];
								$mobile				=$row['mobile'];
								$country			=$row['country'].', '.$row['region'];
								$owner_profile_pic = $row['profile_pic'];
							?>
								<img src="images/shop/<?php echo $picture;?>"   style="height:auto; " alt="<?php echo $name;?>" />
								 
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
									<div class="item active">
									<?php
								 if(isset($_GET['view']))
								{
								 $edit_id = $_GET['view'];
							 
								 $query = mysqli_query("SELECT * FROM products WHERE product_status='1' order by rand() LIMIT 4");
 
							while( $row =mysqli_fetch_array($query)){
								$other_serial				=$row['serial'];
								$other_category     		=$row['category'];
						 
								$other_name          	=$row['name'];
								 
							 
								 
								$other_picture			=$row['picture'];
								  
							 $i=0;

							?>
									
									
									
									
										
									 
										  <a href="product-details.php?view=<?php echo $other_serial;?>" title="<?php echo ucwords($other_name);?>">
										  <img src="images/shop/<?php echo $other_picture;?>"   alt="<?php echo $other_name;?>" style="width:60px; height:auto;"/></a> 
										 
										 				<?php } ?>
										</div>
									</div>

								  <!-- Controls -->
								 
							</div>
						</div>
						<div class="col-sm-7">
						
						<div class="blog-post-area pull-left">
							 <?php if($owner_id ==$_SESSION['user_id']){ ?>
				<div class="post-meta">
								<ul>
									
									
						
							 <li><a href="deleteproduct.php?del=<?php echo $edit_id;?>"><i class="fa fa-times"></i> Delete Product </a> </li>  
							 <li><i class="fa fa-pencil"></i><a href="edit_product.php?edit=<?php echo $edit_id;?>"> Edit Product </a></li>
						
									
								</ul>
								 
							</div>
								 <?php } ?>
							</div>
						<div class="clearfix"></div>
						<span class="show_contact" style="display:none;">
							<div class="product-information"><!--/product-information-->
							 
								 <div class="col-sm-4"><img class="profile-user-img img-responsive " src="images/profile_pics/<?php echo $owner_profile_pic;?>" alt="Matthew" style="height:auto; width:100px;  border-radius:4px;">
							 								 
							</div>
							 <div class="col-sm-8">
								 <div class="blog-post-area pull-left">
				<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php  echo $owner; ?></li><br><br>
									<li><i class="fa fa-phone"></i>  <?php echo $mobile;?></li><br><br>
									<li><i class="fa fa-envelope"></i> <?php echo $email;?></li></li><br><br>
									<li><i class="fa fa-globe"></i> <?php echo $country.', '.$region;?></li></li>
									
								</ul>
								 
							</div>
							</div>
							</div>
								 
								 
								<span>
									 
							
								 <button type="button" class="btn btn-fefault cart" >  
										  Hide</button>
									
									 
								</span>
								 
								 <div class="alert alert-info dismissable " style="margin:10px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> 
					<i class="fa fa-warning" style="font-size:20px; text-decoration:blink;"></i> Please, Before Submiting any Personal Details To Any Marketer, Be Sure You Have Credible Information On That Marketer! </div>
								 
							</div>
							</span>
							<div class="product-information"><!--/product-information-->
								 
								 
								</h2>
								<p>Product Name: <?php echo $name;?></p>
								<p>Web ID: LJstr<?php echo $edit_id;?></p>
								<p>Description: <?php echo $description;?></p>
								
							
								<span>
									<span>US $<?php echo $price;?></span>
							
								 <button type="button" class="btn btn-fefault cart" >  
										<i class="fa fa-phone"></i> Contact</button>
									
									<?php 
								}
									} ?>
								</span>
								 
								 
								<p><b>Negotiable:</b>
								<?php 
												
												if($negotiable == 'No'){ 
												echo'<span style="color:red">Not Negotiable </span>';
												}
												else
												{
												echo '<span style="color:#4fbfa8;">Negotiable</span>';
												}?>
												</p>
							</div>
							
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							
								<li class="active"><a href="#reviews" data-toggle="tab"><i class="fa fa-folder-open"></i> Reviews below</a></li>
							</ul>
						</div>
						
						
						<script>
							$('.cart').on('click', function(){
								$('.show_contact').toggle();
							});
							</script>	
						
						
						
						<div class="tab-content">
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								
<?php

$query="select * from comments where product_serial='$edit_id' order by 1 ASC";
$run=mysqli_query($conn, $query);
while($rows=mysqli_fetch_array($run))
{
$name=$rows['customer'];
$msg=$rows['message'];
$date=$rows['datetime'];


?>
									<ul>
								<li><a href=""><i class="fa fa-user"></i><?php echo $name; ?></a></li>
									<li><a href=""><i class="fa fa-calendar-o"></i><?php echo $date; ?></a></li>
									</ul>
									<p><?php echo $msg; ?></p>
								<?php	}
?>
									<p><b>Write Your Review</b></p>
									
									<form action="review.php" enctype="multipart/form-data" method="post">
										<span>
											<input type="text" name="customer"  autocomplete="off" placeholder="Your Name"/>
											<input type="email" autocomplete="off" name="email" placeholder="Email Address"/>
										</span>
										<textarea name="message" placeholder="Comments Here..."></textarea>
									
										<input type="submit" name="submit" value="Post" class="btn btn-default pull-right">
										
									</form>
								</div>
							</div>
																



		
						</div>
					</div><!--/category-tab-->
									
				</div>
			</div>
		</div>
	</section>
	<?php include('includes/footer.php')?>