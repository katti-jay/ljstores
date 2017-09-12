<?php

include('includes/connect.php');

if(isset($_GET['del']))
	{
	
		$delete_id = $_GET['del'];
		
		$delete_query = "DELETE FROM products WHERE serial = '$delete_id'";
		
		
		if(mysqli_query($delete_query))
			{
				echo"<script>alert('Product deleted successfully');</script>";
				
				echo"<script>window.open('index.php','_self');</script>";
				
				
			}
	
	}

?>