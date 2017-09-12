<?php   
include('connect.php');
   if(!isset($_SESSION["user_id"]))
 {
    echo "<script>window.location='login.php';</script>";
 }
 else{
  $username= $_SESSION["user_login"];
 }
?>


<?php 
		if(isset($_POST['cat_id'])){
			$cat_id_fk = $_POST['cat_id'];
	     $sql= mysqli_query ($connection, "SELECT * FROM sub_categories WHERE cat_id_fk ='$cat_id_fk'");//query DB
	
	?>
	
	 
	<?php 
	 // `sub_id`, `cat_id_fk`, `sub_cat_name`
	 while($row= mysqli_fetch_array($sql))
       {
		$sub_id				=$row["sub_id"];
		$cat_id_fk			=$row["cat_id_fk"];
		$sub_cat_name	=$row["sub_cat_name"];
      
	?>
	
	
							<option value="<?php echo $sub_id; ?>" ><?php echo $sub_cat_name; ?> </option>
							 
						 
	   <?php } } ?>
