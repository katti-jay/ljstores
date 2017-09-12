
<?php
 
include ('includes/Headsection.php');
if(isset($_POST['submit'])){

$email=mysqli_real_escape_string($_POST['email']);

$name=mysqli_real_escape_string($_POST['customer']);

$msg=mysqli_real_escape_string($_POST['message']);

if($email=='' or $name=='' or $msg=='' )
			{
				echo"<script>alert('No field should be left blank');</script>";
				
				exit();
			}
		else{
$query = mysqli_query("INSERT INTO comments(email,customer,product_serial,message,datetime) VALUES('$email','$name',' $_SESSION[review]','$msg',now())");
if($query){
	echo'<script> window.location="product-details.php?view='; echo $_SESSION['review']; echo' "</script>';
}
		}
}
?>