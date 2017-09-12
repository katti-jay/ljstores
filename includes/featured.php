<div class="features_items">
					<!--features_items-->
					
						<h2 class="title text-center">Features Items</h2>
						
																<?php 
								// `serial`, `category`, `subcategory`, `name`, `description`, `price`, `picture`
								$sql=mysqli_query("SELECT * FROM products ORDER BY date DESC LIMIT 12");
								While($row=mysqli_fetch_array($sql))
								{
								    
								$serial=$row['serial'];
								$category=$row['category'];
								$subcategory=$row['subcategory'];
								$name=$row['name'];
								$description=$row['description'];
								$price=$row['price'];
								$picture=$row['picture'];
								$date=$row['date'];
									?>
						<div class="col-sm-4">
							
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<img src="images/shop/<?php echo $picture; ?>"  alt="<?php echo $name; ?>" style="width:; height: 200px;" />
										<h2>$<?php echo $price; ?></h2>
										<p><?php echo $name; ?> </p>
										<a href="#" class="btn btn-default add-to-cart">
										<i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo $price; ?></h2>
											<p><?php echo $description; ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<!----ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul-->
								</div>
							</div>
							
						</div>
						<?php } ?>
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>