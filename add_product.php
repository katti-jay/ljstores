<?php 
include ('includes/Headsection.php');
?>

	<section id="form" style="margin-top:-40px; margin-left: 250px;">
	
	<!--form-->
		
			
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
			
					$status = 0;
		if($name=='' || $price=='' || $category=='Category*' || $negotiable=='Negotiable?')
			{
				echo"<script>alert('No field should be left blank');</script>";
				
			}
		else
			{
				move_uploaded_file($image_tmp,"images/shop/$image");
		
				//`serial`, `category`, `name`, `description`, `quantity`, `price`, `picture`, `date`
				$insert_query = "INSERT INTO products Values('', '$_SESSION[user_id]', '$category', '$name', '$description', '$negotiable', '$price', '$image', '$status',now())";
						
				if(mysqli_query($insert_query))
					{
						echo"<script>alert('Product Added successfully!');</script>";
						
				
					}
					else
									{
										echo"<script>alert('Sorry Product was not Added);history.Back();</script>";
										
									}
			            }
	}

?>


	<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Add Product</h2>
						<form action="#"  method="POST" enctype="multipart/form-data">
						
							<input type="text" name="name" placeholder="Name*" value="<?php  ?>" >
							
							<input type="text" name="price" placeholder="Price*" value="<?php  ?>" >
							
				 
						 <center>
						<button class="btn btn-sm pull-left gt_cat" id="1" style="margin:3px;">Male</button>
                         <button class="btn btn-sm pull-left gt_cat"  id="2"style="margin:3px;">Female</button>
                         </center>
						<div>
							<select  name="cat" value="<?php  ?>" class="cat_call">
							<option>Category*</option>
							 
							</select><br /><br />
							</div>
							<select type="text" name="negotiable" placeholder="Negotiable*" value="<?php ?>"/>
							<option>Negotiable?</option>
							<option>Yes</option>
							<option>No</option>
							</select><br /><br />
								 <input type="text" name="description" placeholder="description*" value="<?php  ?>" >			
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
	
	<?php include('includes/footer.php')?>
