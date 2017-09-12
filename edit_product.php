<?php 
include ('includes/Headsection.php');
?>

	<section id="form" style="margin-top:-40px; margin-left: 250px;">
	
	<!--form-->
		
	

	<div class="">
			<div class="row" style="padding-right:100px;">
				<div class="col-sm-8">
				<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
							<?php
								 if(isset($_GET['edit']))
								{
								 $edit_id = $_GET['edit'];
							     $_SESSION['review'] = $_GET['edit'];
								$query = mysqli_query("SELECT * FROM products as p LEFT JOIN users as  u ON(p.user_id_fk = u.id) WHERE p.serial ='$edit_id' LIMIT 1");
 
								While($row =mysqli_fetch_array($query)){
								$serial=$row['serial'];
								$category     		=$row['category'];
						 
								$name          	=$row['name'];
								$description		=$row['description'];
								$negotiable		=$row['negotiable'];
								$price				=$row['price'];
								$picture			=$row['picture'];
								$date				=$row['date'];
								$owner 			=$row['fname'].' '.$row['lname'];
								$username		=$row['username'];
								$email				=$row['email'];
								$mobile				=$row['mobile'];
								$country			=$row['country'].', '.$row['region'];

							?>
								<img src="images/shop/<?php echo $picture;?>"   style="height:auto;" alt="<?php echo $name;?>" />
								 
							</div>
							

						</div>
						<div class="col-sm-7">
			
							<div class="product-information"><!--/product-information-->
								 
								<h2><?php echo $name;?></h2>
								<p>Web ID: LJstr<?php echo $serial;?></p>
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
						</div>
					
				</div>
				<div class="col-sm-4">
					<div class="login-form"><!--login form-->
						<h2>Add Product</h2>
						<form action="#"  method="POST" enctype="multipart/form-data">
						<lable>Product Name</lable>
							<input type="text" name="name" placeholder="Name*" value="<?php echo $name;?>" >
							<lable>Product Price</lable>
							<input type="text" name="price" placeholder="Price*" value="<?php echo $price; ?>" >
							
				 <lable>Product Category</lable>
						 <center>
						<button class="btn btn-sm pull-left gt_cat" id="1" style="margin:3px;">Male</button>
                         <button class="btn btn-sm pull-left gt_cat"  id="2"style="margin:3px;">Female</button>
                         </center>
						<div>
							<select  name="cat" value="" class="cat_call">
							<option>Category*</option>
							 
							</select><br /><br />
							</div>
							<lable>Product Negotiation</lable>
							<select type="text" name="negotiable" placeholder="Negotiable*" value=""/>
							<option>Negotiable?</option>
							
							<option>Yes</option>
							<option>No</option>
							</select><br /><br />
							<lable>Product Description</lable>
								 <input type="text" name="description" placeholder="description*" value="<?php echo $description;?>" >			
							<input type="file" name="image" style="padding-top:10px;" value="<img src="../images/shop/<?php echo $picture;?>">
							<table><tr><td><button type="submit" name="submit" class="btn btn-default"><i class="fa fa-save"></i> Update</button></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><a href="index.php">
							<button type="button" class="btn btn-fefault ">
				<i class="fa fa-arrow-left"></i> Back Home</button></a></td></tr></table>
						</form>
						
					</div>
				</div>
			</div>
					
			</div>
		</div></div></div>
	</section>
	
	<script>
	$('.gt_cat').on('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var cat_id= $(this).attr('id');
 
		var dataString = 'cat_id=' + cat_id;
		$.ajax({
			type:'post',
			url:'includes/get_categories.php',
			data: dataString,
			cache: false,
			beforeSend:function(){},
			success: function(data){
				$('.cat_call').html(data);
				
			}
		});
	});
	</script>
	
	
			
<?php 
//`serial`, `category`, `name`, `description`, `quantity`, `price`, `picture`, `date`
if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['cat']) && isset($_POST['negotiable']))
	{
		     		$name 			= $_POST['name'];
					$price 			= $_POST['price'];
					$description	= $_POST['description'];
					$category 		= $_POST['cat'];
					$negotiable 	= $_POST['negotiable'];
					$image 		= $_FILES['image']['name'];
					$image_tmp 	= $_FILES['image']['tmp_name'];
					$image = $_FILES['image']['name'];
					$image_tmp = $_FILES['image']['tmp_name'];
					if($image ==""){
						$image1= $picture;
					 	}
			
					$status = 0;
		if($name=='' || $price=='' || $category=='Category*' || $negotiable=='Negotiable?')
			{
				echo"<script>alert('No field should be left blank');</script>";
					echo"<script>window.location='';</script>";
				
			}
		else
			{
						if($image !=""){
				move_uploaded_file($image_tmp,"images/shop/$image");
				}else{
					$image =$image1;
							}
		
				//`serial`, `user_id_fk`, `category`, `name`, `description`, `negotiable`, `price`, `picture`, `product_status`, `date`
				$update_query = "UPDATE products SET 
						category = '$category', 
						name = '$name', 
						description = '$description',
						negotiable = '$negotiable',
						price  = '$price', 
						picture = '$image', 
						product_status = '$status' 
						WHERE serial ='$serial' ";
						
				if(mysqli_query($update_query)){
						echo"<script>alert('Product Updated successfully!');</script>";
							echo"<script>window.location='';</script>";
				}
					else{
							echo"<script>alert('Sorry Product was not Updated');history.Back();</script>";
							}
			            }
	}

?>

	
	
	<?php include('includes/footer.php')?>
