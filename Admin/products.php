<?php  
include ('includes/Headsection.php');
 
?>
 

	<section  class="container">
	<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active"><a href="products.php">Active Product</a></li>
				  <li class=""><a href="new_products.php">New/Pending Product</a></li>
				  <li class=""><a href="banned_products.php">Banned Product</a></li>
				</ol>
			</div>
	<?php include('includes/category.php')?>
	
				<div class="col-sm-9 padding-right">
					<div class="features_items">
					 
						<h2 class="title text-center">Listed Product</h2>
						
			<?php 
							 
								$sql=mysql_query("SELECT * FROM products WHERE product_status = 1 ORDER BY date DESC");
								While($row=mysql_fetch_array($sql))
								{
								    
								$serial=$row['serial'];
								$category=$row['category'];
							 
								$name=$row['name'];
								$description=$row['description'];
								$negotiable=$row['negotiable'];
								$price=$row['price'];
								$picture=$row['picture'];
								$date=$row['date'];
								$i=0;
									?>						
						<div class="col-sm-3">
						<div class="product-image-wrapper">
							
								<div class="single-products">
								
										<div class="productinfo text-center">
										<div style="height: 200px; overflow:hidden;">
										<img src="../images/shop/<?php echo $picture; ?>"  alt="<?php echo $name; ?>" >
										</div>
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
										<i class="fa  fa-eye"></i>View Product</a></div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo $price; ?></h2>
											<p><?php echo $description; ?></p>
											
											<p >
											<a   type="button" class="btn btn-default add-to-cart"  href="product-details.php?view=<?php echo $serial;?>">View Product Details</a></p> 
											  
										</div>
									</div>
								</div>
								 
							</div>
							 
						</div>
						<?php  } ?>
						
					</div>
					<!--features_items-->
					
					
				</div>
	</section>
<?php 
	include('includes/footer.php')
	?>
	 
  
  
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="../js/gmaps.js"></script>
	<script src="../js/contact.js"></script>
	<script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
    