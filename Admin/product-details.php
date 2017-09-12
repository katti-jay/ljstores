<?php  
include ('includes/Headsection.php');
include('includes/functions.php');
 
?>
 
				
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
	
	
									<script>
							$('.cart').on('click', function(){
								$('.show_opt').toggle();
							});
							</script>	
						
	<section>
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Product Details</li>
				</ol>
			</div>
				 
							<div class="clearfix"></div>
			<div class="row">
	 
					<div class="product-details"><!--product-details-->
						<div class="col-sm-3">
							<div class="view-product">
							<?php
								 if(isset($_GET['view']))
								{
								 $edit_id = $_GET['view'];
							     $_SESSION['review'] = $_GET['view'];
								$query = mysql_query("SELECT * FROM products as p LEFT JOIN users as  u ON(p.user_id_fk = u.id) WHERE p.serial ='$edit_id' LIMIT 1");
 
								While($row =mysql_fetch_array($query)){
								$serial=$row['serial'];
								$category     		=$row['category'];
						 
								$name          	=$row['name'];
								$description		=$row['description'];
								$negotiable		=$row['negotiable'];
								$price				=$row['price'];
								$picture			=$row['picture'];
								$date				=$row['date'];
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
 
									 
								
								$owner_id			=$row['user_id_fk'];
								$owner 			=$row['fname'].' '.$row['lname'];
								$username		=$row['username'];
								$email				=$row['email'];
								$mobile				=$row['mobile'];
								$country			=$row['country'].', '.$row['region'];

							?>
								<img src="../images/shop/<?php echo $picture;?>"   style="height:auto;" alt="<?php echo $name;?>" />
								 
							</div>
							

						</div>
						 
						<div class="col-sm-5">
						
							<div class="product-information"><!--/product-information-->
								 
								<h2><?php echo $name;?> 
								  
								</h2>
								<p>Web ID: LJstr<?php echo $serial;?></p>
								<?php echo $product_status_en; ?>
								<p>Description: <?php echo $description;?></p>
							
							
								<span>
									<span>US $<?php echo $price;?></span>
							
								 
									
									<?php } 
									
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
								
					<div class="col-sm-4">
					<div class="category-tab shop-details-tab">
					<div class="show_opt"><!--category-tab-->
			<form name="up_product_stat" method="Post" action="#">
		 
					<lable><h4>Change Product Status</h4><lable>
					<select name="opt_data" value="" class="opt_data">
					<option value="choose">Choose Action </option>
 <?php
 
 	if($product_status == 0){ ?>
		<option value="1">Publish </option>
		<option value="2">Deny</option>
											<?php	}
										if($product_status == 1){
												?>
		<option value="0">Suspend</option>
		<option value="2">Deny </option>
									<?php	}
										if($product_status == 2) {
									?>
		<option value="1">Publish </option>
		<option value="0">Suspend</option>
									<?php	}
 
 ?>
						
							  
							
					 
						</select>
							<br>
							<br>
							<button type="submit" class=" btn btn-default cart text-left">Submit</button> 
							<br>
							</form>
							<?php 
							if(isset($_POST['opt_data'])){
								$new_product_status =$_POST['opt_data'];
								if($new_product_status =='choose'){
									echo "<script>alert('Please Choose a Status');</script>";	exit();
								}
								$query_up = mysql_query("UPDATE products SET product_status= '$new_product_status ' WHERE serial ='$edit_id' ");
								if($query_up ){
									echo "<script>window.location='';</script>";
									exit();
								}
							}
							
							?>
					</div>	
					
						<div class="col-sm-12">

							<ul class="nav nav-tabs">
							
								<li class="active"><a href="#reviews" data-toggle="tab"><i class="fa fa-folder-open"></i> Reviews below</a></li>
							</ul>
						</div>
						
					
						<div class="tab-content">
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								
<?php

$query="select * from comments where product_serial='$edit_id' order by 1 ASC";
$run=mysql_query($query);
while($rows=mysql_fetch_array($run))
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
									 
								</div>
							</div>
																



		
						</div>
					</div><!--/category-tab-->
					</div><!--/category-tab-->
									
	 
					</div><!--/product-details-->
			
			</div>
		</div>
	</section> 
</body>
</html>