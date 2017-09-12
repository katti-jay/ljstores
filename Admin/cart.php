<?php 
include ('includes/Headsection.php');
include ('includes/functions.php');

if(isset($_POST['command'])=='add' && isset($_POST['productid'])>0){
		$pid = $_REQUEST['productid'];
		addtocart($pid,1);
		header("location:cart.php");
		exit();
	}
	

?>

  <script language="javascript">
	function del(pid){
		if(confirm('Do you really want to delete this item?')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, do You want to continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}

</script>

<?php
	
	if(isset($_POST['command'])=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if(isset($_POST['command'])=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	
	}?>
</head>


<body class="">
<section id="cart_items">
	 <div class="clear"></div>
<div class="container">
	<div class="content">
	
	
<form name="form1" method="POST"  class="mainSettingsForm add" enctype="multipart/form-data">
<input type="hidden" name="pid" />
<input type="hidden" name="command"/>
<div class="content">
	
<div class="header">
	
  
    </div>
    	<div><?php echo $msg; ?></div>
		<div class="table-responsive cart_info">
    <table class="table table-condensed">
		<thead>
			<tr class="cart_menu" style=" background: #FE980F; color: #fff;  font-size: 16px;  font-family: 'Roboto', sans-serif;  font-weight: normal;">			
    	<?php
			
            	
				if(is_array($_SESSION['cart'])){
					echo '
				<td>Item No.</td>
				<td><i class="fa fa-picture-o"></i> image</td>
				<td>Name</td>
				<td>Price</td>
				<td>Quantity</td>
				<td>Amount</td>
				<td><i class="fa fa-minus-circle"></i></td>
				</tr>
									</thead>
					<tbody>';
				
				$max = count($_SESSION['cart']);
				for($i=0; $i<$max; $i++){
					$pid = $_SESSION['cart'][$i]['productid'];
					$q = $_SESSION['cart'][$i]['qty'];
					$pname = get_product_name($pid);
					$pic = get_product_picture($pid);
					if($q == 0) continue;
			?>
            		
			<tr>
            		<td class="cart_product"> <?php echo "No.";echo $i+1;?> </td>
            		<td><img src="images/shop/dbproducts/<?php echo $pic;?>" style="width:80px; height:60px; border-radius:3px;"></td>
            		<td class="cart_description"><?php echo $pname; ?></td>
            		
                    <td class="cart_price">$ <?php echo get_price($pid); ?></td>
                    
                    <td class="cart_quantity">
			<input type="text" name="product<?php echo $pid; ?>" value="<?php echo $q; ?>" maxlength="3" size="2" />
		    </td> 
                                       
                    <td class="cart_total">$ <?php echo get_price($pid)*$q; ?></td>
                    
                  
					<td class="cart_delete">
						<a class="cart_quantity_delete" href="javascript:del(<?php echo $pid; ?>)"><i class="fa fa-times"></i></a>
					
			</tr>
			
            <?php					
				}
			?><tr>
		
				<td> 
				<button type="button" class="btn btn-fefault cart"  onclick="window.location = 'index.php'">
				<i class="fa fa-arrow-left"></i> Continue Shopping</button>
				</td><td></td><td></td>
				<td colspan="5"><div class="btns">
				
				<button type="button" class="btn btn-fefault cart"  onclick="clear_cart()"><i class="fa fa-trash-o"></i> Clear Cart</button>
				
				 <button type="button" class="btn btn-fefault cart"  onclick="update_cart()"><i class="fa fa-refresh"></i> Update Cart</button>
				 <b class="btn btn-fefault cart"><i class="fa fa-money"></i> Order Total: $<?php echo get_order_total(); ?></b>
				</div>
				</td> 
				</tr>
				<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'>
				<td>You seem to have an empty shopping cart! try our products</td>
				</tr> </tbody>";
			}
		?>
        </table>
		</div>
    
     <br />
	 <br />
	
</section>

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input name="chck" type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input name="chck" type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input name="chck" type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php echo get_order_total(); ?></span></li>
							<li>Eco Tax <span>$5</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?php echo get_order_total()+5; ?></span></li>
						<br/>
							<button type="button" class="btn btn-fefault cart"  onclick="update_cart()"><i class="fa fa-refresh"></i> Update Cart</button>
							<button type="button" class="btn btn-fefault cart"><i class="fa fa-credit-card"></i> Check Out</a>
							</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php 
	include('E_Bashincludes/footer.php')
	?>
  