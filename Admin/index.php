

<?php 
include ('includes/Headsection.php');

include('includes/functions.php');
 
	
 	if(!isset($_SESSION["spur_login2"])){
  echo "<script> window.location='login.php'</script>";
 }  
	

?>
								</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	 
  
<body> 
<section id="cart_items">
            <div class="container">
                <div class="row-fluid">
              <div class="span12">
              <div class="col-md-12">
			  
<script type="application/javascript" src="js/awesomechart.js"></script>
 
	<div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>
				  <?php 
				  $sql= mysqli_query ($connection, "SELECT * FROM users"); //query DB
						echo $count = mysqli_num_rows($sql);
				  ?>
				  Users
				  </h3>
                  <p> <span class="text-sm"> <?php $sql= mysqli_query ($connection, "SELECT * FROM users WHERE user_status ='0' "); 
						echo $count = mysqli_num_rows($sql); ?> New User<?php if($count == 0 || $count > 1) {echo 's'; }?></span></p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
			<div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-yellow">
               <div class="inner">
                  <h3>
				  <?php 
				  $sql= mysqli_query ($connection, "SELECT * FROM products"); //query DB
						echo $count = mysqli_num_rows($sql);
				  ?>
				  Products
				  </h3>
                  <p><span class="text-sm"> <?php $sql= mysqli_query ($connection, "SELECT * FROM products WHERE product_status ='0' "); 
						echo $count = mysqli_num_rows($sql); ?> New Product<?php if($count == 0 || $count > 1) {echo 's'; }?></span></p>
                </div>
                <div class="icon">
                  <i class="fa  fa-shopping-cart"></i>
                </div>
                <a href="products.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			<div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
				  <?php 
				  $sql= mysqli_query ($connection, "SELECT * FROM category"); //query DB
						echo $count = mysqli_num_rows($sql);
				  ?>
				  Categories
				  </h3>
                  <p> <span class="text-sm"> <?php $sql= mysqli_query ($connection, "SELECT * FROM sub_categories"); 
						echo $count = mysqli_num_rows($sql); ?> Subcategorie<?php if($count == 0 || $count > 1) {echo 's'; }?></span></p>
                </div>
                <div class="icon">
                  <i class="fa fa-tasks"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
	 
  
						
						
			
	<div class="col-md-12" style="display:inline-block; margin-top:10px;">
	<div class="table-responsive cart_info">
    <table class="table table-hover">
		<thead>
			<tr class="cart_menu" style="color: #fff;  font-size: 16px;  font-family: 'Roboto', sans-serif;  font-weight: normal;">			
    		 
				<td><i class="fa fa-picture-o"></i> image</td>
				<td>Name</td>
				<td>Email</td>
				<td>Country</td>
				<td>Products</td>
				<td>Status</td>
				<td>Date Join</td>
				<td><i class="fa fa-gears"></i> Action</td>
				</tr>
									</thead>
					<tbody>
		<?php
		
			$sql=mysqli_query($connection, "SELECT * FROM users");
								While($row=mysqli_fetch_array($sql))
								{
								    
									// `id`, `fname`, `lname`, `username`, `email`, `mobile`, `password`, `country`, `region`, `profile_pic`, `user_status`, `signup`
									
									
							  	 $front_user_id		= $row['id'];
								$front_user_name	= $row['fname'].' '.$row['lname'] ;
							 	$front_username	=$row['username'];
								$front_email			=$row['email'];
								$front_mobile		=$row['mobile'];
								$front_country		=$row['country'].', '.$country=$row['region'] ;
								$front_profile_pic	=$row['profile_pic'];	
								$front_user_status	=$row['user_status'];	
								$front_signup		=$row['signup'];	
								 
								 
									$sqlc= mysqli_query ($connection, "SELECT * FROM products WHERE user_id_fk ='$front_user_id'");  
									 $count_porducts = mysqli_num_rows($sqlc);
								 
								// $serial=$row['serial'];
								// $category=$row['category'];
								// $name=$row['name'];
								// $description=$row['description'];
								// $negotiable=$row['negotiable'];
								// $price=$row['price'];
								// $pic=$row['picture'];
								// $date=$row['date'];
														
									?>				
            	
				
			<tr>
            	   
            		<td><img src="../images/profile_pics/<?php echo $front_profile_pic;?>" style="width:50px; height:auto; border-radius:3px;"></td>
            		<td><?php echo $front_user_name; ?></td>
            		<td> <?php echo $front_email; ?></td>
                    
                    <td><?php echo $front_country; ?></td> 
                    <td><?php  echo $count_porducts; ?> Products</td> 
                    <td><?php if($front_user_status ==0){echo 'PENDING';}  if($front_user_status ==1){echo 'ACTIVE';}    if($front_user_status ==2){echo 'SUSPENDED';}   ?> </td> 
                                       
                    <td><?php echo date('F jS, Y H:i:s', strtotime($front_signup)); ?></td>
                    <td class="cart_delete" style="margin-top:15px;">
						<span><a class="" href="user_profile.php?edit=<?php echo $front_user_id; ?>" 	  title="View" ><i class="fa fa-eye"></i></a>	</span>
							<span><a class="" href="index.php?del=<?php echo $front_user_id; ?>" title="Delete user"><i class="fa fa-times"></i></a>	</span>
						 </td> 
			</tr>
			
            <?php } ?>   <?php 
if(isset($_GET['del']))
	{
	
		$delete_id = $_GET['del'];
		
		$query_del = mysqli_query($connection, "DELETE FROM users  WHERE id ='$_GET[del]' ");
								if($query_del){
									
									$query_del2 = mysqli_query($connection, "DELETE FROM products  WHERE user_id_fk ='$_GET[del]' ");
									if($query_del2 ){
											echo "<script>alert('User Deleted Succefully');</script>";
									echo "<script>window.location='index.php';</script>";
									exit();
									}
								
								}
									
								}
		
		
		 
	?> 
			
			 </tbody>
        </table>
		</div>			
		</div>			
						
						
						
						
						
						
						
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
	 
 
 
		</section>
<?php 
	include('includes/footer.php')
	?>
  <style>
  .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
	color:#FFFFFF;
}

.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
    background-color: #f39c12 !important;
	color:#FFFFFF;
}
.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39 !important;
	color:#FFFFFF;
}

.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #4fbfa8 !important;
	color:#FFFFFF;
}
.small-box>.inner {
    padding: 10px;
}

.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: -10px;
    right: 20px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,0.15);
}


.small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.text-red{
	color:  #dd4b39 !important;
	font-weight:500;
}
  </style>