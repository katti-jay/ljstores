<?php 
include ('E_Bashincludes/Headsection.php');
?>

	<section id="form" style="margin-top:-40px; margin-left: 250px;">
	
	<!--form-->
	<?php
	if(isset($_GET['edit']))
		{
				$edit_id = $_GET['edit'];
				$edit = mysql_query("SELECT * FROM products WHERE serial ='$edit_id'");
			
				while($row=mysql_fetch_array($edit)){
					
								$serial=$row['serial'];
								$category=$row['category'];
								$name=$row['name'];
								$description=$row['description'];
								$quantity=$row['quantity'];
								$price=$row['price'];
								$pic=$row['picture'];
								$date=$row['date'];
						}					
									?>				

	<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--update form-->
						<h2>Edit Product</h2>
						<form action="" method="post" enctype="multipart/form-data">
							<input type="text" name="p_name" placeholder="Name*"  value="<?php echo $name;?>">
							
							<input type="text" name="p_price" placeholder="Price*" value="<?php echo $price;?>">
							
							<h2>Other Features</h2>
						 <input type="text" name="description" placeholder="description*" value="<?php echo $description;?>">
						 
							<select name="category">
							<option><?php echo $category;?></option>
							<option>Electric Gadgets</option>
							<option>Kitchen Appliances</option>
							<option>Garden Tools</option>
							<option>Carpentry Tools</option>
							<option>Ladies</option>
							<option>Gents</option>
							</select><br /><br />
							
							<input type="text" name="quantity" placeholder="Quantity*" value="<?php echo $quantity;?>">
											
							<input type="file" name="image" style="padding-top:10px;" value= "../images/shop/<?php echo $row['picture'];?>">
							<p><img src="../images/shop/<?php  echo $pic;?>" style="hieght:150; width: 200px;"></p>
		<table><tr><td>
							<button type="submit" name="update" class="btn btn-update"><i class="fa fa-upload"></i> update</button></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><a href="index.php">
<button type="button" class="btn btn"> Back Home</button></a></td></tr></table>
			
							<?php } ?>
						</form>
						
					</div>
				</div>
			</div>
			
			</div>
		</div></div></div>
	</section><!--/form-->
	
	<?php include('E_Bashincludes/footer.php');?>
	
<?php 
//`serial`, `category`, `name`, `description`, `quantity`, `price`, `picture`, `date`
					if(isset($_POST['update']))
						
	{           
					$update_id = $_GET['edit'];
		     		$name1 = $_POST['p_name'];
					$price1 = $_POST['p_price'];
					$description1= $_POST['description'];
					$category1 = $_POST['category'];
					$quantity1 = $_POST['quantity'];
					$image1 = $_FILES['image']['name'];
					$image_tmp = $_FILES['image']['tmp_name'];
					$date = date('d-m-y');
					
		if($name1=='' or $price1=='' or $image1=='')
			{
				echo"<script>alert('No field with * should be left blank');</script>";
				exit();
			}
		else
			{
				move_uploaded_file($image_tmp,"../images/shop/$image1");
				//`serial`, `category`, `name`, `description`, `quantity`, `price`, `picture`, `date`	
				$update = "UPDATE products SET
				category='$category1', 
				name='$name1', 
				description='$description1', 
				quantity='$quantity1', 
				price='$price1',
				picture= '$image1',
				date=now() WHERE serial = '$update_id'";
						
				if(mysql_query($update))
					{

						echo"<script>alert('Product Updated successfully!'); </script>";
						
					}
					else
									{
										echo"<script>alert('Update Not successful!'); history.BBack();</script>";
										
									}
			            }
	
	}

?>
<?php 
	include('includes/footer.php')
	?>