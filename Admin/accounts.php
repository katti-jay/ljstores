
<?php 
include ('includes/Headsection.php');

include('includes/functions.php');

if(isset($_POST['command'])=='add' && isset($_POST['productid'])>0){
		$pid = $_REQUEST['productid'];
		addtocart($pid,1);
		header("location:cart.php");
		exit();
	}
		if(!isset($_SESSION["spur_login2"]))
 {
   Header('Location:login.php');
 }

?>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search by date"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
<script>
	function addtocart(pid)
	{
	    document.form1.command.value='add';
		document.form1.productid.value=pid;
		document.form1.submit();
	}
  </script>
  
<body> 
<section id="cart_items">
          
                </div>



            </div>
        </div>
    </div>
		<div class="col-6" style="width:90%; margin-left:5%;">
<div class="product-image-wrapper">
	<div class="table-responsive cart_info">
    <table class="table table-condensed">
		<thead>
			<tr class="cart_menu" style=" background: #FE980F; color: #fff;  font-size: 16px;  font-family: 'Roboto', sans-serif;  font-weight: normal;">
			<td>Order Id.</td>
				<td>Company</td>
				<td>Title</td>
				<td>Name</td>
				<td>E-mail</td>
				<td>Address</td>
				<td>Phone</td>
				<td>Region</td>
				<td>City</td>
				<td>Postal Message</td>
				<td>Total</td>
	       		<td><i class="fa fa-gears"></i>   </td>
				</tr>
									</thead>
					<tbody>'
			
		<?php
		
			$sql=mysqli_query("SELECT * FROM order_detail");
								While($row=mysqli_fetch_array($sql))
								{
								    
					$id = $row['orderid'];
					$compname = $row['compname'];
		     		$title = $row['title'];
		     		$fname = $row['fname'];
					$lname = $row['lname'];
					$othername = $row['othername'];
		     		$email = $row['email'];
		     		$address = $row['address'];
					$phone= $row['phone'];
					$region = $row['region'];
					$city = $row['city'];
					$othermsg = $row['othermsg'];
					$total = $row['total'];
														
									?>				
            	
				
			<tr>
            		<td> <?php echo $id;?> </td>
            		<td> <?php echo $compname;?> </td>
            		<td> <?php echo $title;?> </td>
            		<td><?php echo $fname .' '.$othername .' '.$lname; ?></td>
            		<td> <?php echo $email;?> </td>
					<td> <?php echo $address;?> </td>
					<td> <?php echo $phone;?> </td>
					<td> <?php echo $region;?> </td>
					<td> <?php echo $city;?> </td>
					<td> <?php echo $othermsg;?> </td>
                    <td>$ <?php echo $total; ?></td>
                  	<td class="cart_delete" style="margin-top:15px;">
						
						<!--a class="cart_quantity_delete" href="editproduct.php?edit=<?php echo $serial; ?>"><i class="fa fa-wrench"></i></a--->
						<a class="cart_quantity_delete" href="deleteproduct.php?del=<?php echo $serial; ?>"><i class="fa fa-times"></i></a>
					
			</tr>
			
            <?php					
				}	
			?><tr>
		
				<td> </td><td> </td> <td> 
				<button type="button" class="btn btn-fefault cart"  onclick="window.location = '../index.php'">
				<i class="fa fa-arrow-left"></i> Back</button>
				</td><td></td><td></td>
				<td colspan="5"><div class="btns">
				
				
		
		
				</div>
				</td> 
				</tr>
			 <?php
            
			
		?>
			 </tbody>
        </table>
		</div>
		</div>
		</div>
		</div>
		</section>
<?php 
	include('includes/footer.php')
	?>
  