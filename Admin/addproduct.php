<?php 
include ('E_Bashincludes/Headsection.php');
?>

	<section id="form" style="margin-top:-40px; margin-left: 250px;">
	
	<!--form-->
		
			
<?php 
//`serial`, `category`, `name`, `description`, `quantity`, `price`, `picture`, `date`
if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['cat']) && isset($_POST['quantity']))
	{
		     		$name = $_POST['name'];
					$price = $_POST['price'];
					$description= $_POST['description'];
					$category = $_POST['cat'];
					$quantity = $_POST['quantity'];
					$image = $_FILES['image']['name'];
					$image_tmp = $_FILES['image']['tmp_name'];
			
					
		if($name=='' || $price=='')
			{
				echo"<script>alert('No field with * should be left blank');</script>";
				
			}
		else
			{
				move_uploaded_file($image_tmp,"../images/shop/$image");
		
				//`serial`, `category`, `name`, `description`, `quantity`, `price`, `picture`, `date`
				$insert_query = "INSERT INTO products Values('', '$category', '$name', '$description', '$quantity', '$price', '$image',now())";
						
				if(mysql_query($insert_query))
					{
						echo"<script>alert('Product Added successfully!');</script>";
						
				
					}
					else
									{
										echo"<script>alert('Sorry Product was not Added !');history.Back();</script>";
										
									}
			            }
	}

?>


	<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Add Product</h2>
						<form action="addproduct.php"  method="POST" enctype="multipart/form-data">
						
							<input type="text" name="name" placeholder="Name*" value="<?php  ?>" >
							
							<input type="text" name="price" placeholder="Price*" value="<?php  ?>" >
							
							<h2>Other Features</h2>
							
						 <input type="text" name="description" placeholder="description*" value="<?php  ?>" >
						 
							<select  name="cat" value="<?php  ?>" >
							<option>Category*</option>
							<option>Electric Gadgets</option>
							<option>Kitchen Appliances</option>
							<option>Garden Tools</option>
							<option>Carpentry Tools</option>
							<option>Ladies</option>
							<option>Gents</option>
							</select><br /><br />
							
							<input type="text" name="quantity" placeholder="Quantity*" value="<?php ?>"/>
											
							<input type="file" name="image" style="padding-top:10px;" value="<img src="../images/shop/<?php  ?>">
							<table><tr><td><button type="submit" name="submit" class="btn btn-default"><i class="fa fa-save"></i> Add</button></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
	<?php include('includes/footer.php')?>
