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
	
<script>
	function addtocart(pid)
	{
	    document.form1.command.value='add';
		document.form1.productid.value=pid;
		document.form1.submit();
	}
</script>
 
 
	<section>
	<?php include('includes/category.php')?>
	
				<div class="col-sm-9 padding-right">
					<div class="features_items">
					<!--features_items-->
					
						<h2 class="title text-center">Products</h2>
						
<form name="form1" method="post">
	<input type="hidden"  name="productid" />
    <input type="hidden"  name="command" />
</form>
										<?php 
										if (isset($_POST['search'])){
											$prod=$_POST['prod'];
								// `serial`, `category`, `subcategory`, `name`, `description`, `price`, `picture`
								$sql=mysqli_query($conn, "SELECT * FROM products as p LEFT JOIN sub_categories as sc ON(p.category = sc.sub_id) WHERE p.name  LIKE '%$prod%' OR p.description LIKE '%$prod%' OR p.category LIKE '%$prod%'  OR sc.sub_cat_name LIKE '%$prod%'  ORDER BY date DESC");
								$count=mysqli_num_rows($sql);
								If($count<1){
									
									echo
										'<div class="col-sm-9 padding-right"> 
                            <div class="charts_container">
                                <div class="chart_container">
                                     <div class="alert alert-info">Sorry the product you are looking for is out of Stocks, It will be filled up soon. Thank You for Shopping With Lj-stores</div>  
                                    <canvas id="chartCanvas1" width="1100" height="400">
                                        Your web-browser does not support the HTML 5 canvas element.
                                    </canvas>

                                </div>
                            </div>
        </div>
                  ';
									
								} 
									
								
								
								While($row=mysqli_fetch_array($sql))
								{
								    
								$serial=$row['serial'];
								$category=$row['category'];
								$subcategory=$row['subcategory'];
								$name=$row['name'];
								$description=$row['description'];
								$negotiable=$row['negotiable'];
								$price=$row['price'];
								$picture=$row['picture'];
								$date=$row['date'];
									?>						
						<div class="col-sm-3">
						<div class="product-image-wrapper">
							
								<div class="single-products">
								
										<div class="productinfo text-center">
										<div style="max-height: 220px; overflow:hidden;">
										<img src="images/shop/<?php echo $picture; ?>"  alt="<?php echo $name; ?>" >
										</div>
										<h2>$<?php echo $price; ?></h2>
										<p><?php echo $name; ?> </p>
										
										<p> 
								<?php 
												
												if($negotiable == 'No'){ 
												echo'<span style="color:red">Not Negotiable </span>';
												}
												else
												{
												echo '<span style="color:#4fbfa8;">Negotiable</span>';
												}?>
												</p>
										
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
									
												</ul>
								</div>
							</div>
							
						</div>
										<?php }} ?>
						
					</div>
					<!--features_items-->
					
					
				</div>
	</section>
	<?php 
	include('includes/footer.php')
	?>
  
    