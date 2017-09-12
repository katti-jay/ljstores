<?php 
include ('includes/Headsection.php');

?>
	
	<section id="form">
	
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
                        <center> <img class="img-circle" src="images/home/smile.jpg" alt="" height="200" width="150"/></center>
                       
						<h2>Login to your account Admin</h2>
                       
						<form action="login.php" name="log" method="POST">
							<input type="text" name="spur_login2" placeholder="Name" />
							<input type="password" name="spur_password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="login" class="btn btn-default">Login</button>
						</form>
					</div>
					
					<!--/login form-->
			
			</div>
				
				</div>

	</section><!--/form-->
	
	
 <?php 
	//user login	    
if (isset($_POST['spur_login2']) && isset($_POST['spur_password']))
     {
      $spur_login2 = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["spur_login2"]);//filter everything but numbers and letters
     $spur_password = strip_tags( $_POST["spur_password"]);//strips off all tags
     
     $spur_password = md5($spur_password);
     
     $sql= mysqli_query ($connection, "SELECT serial FROM admin WHERE name ='$spur_login2' AND password ='$spur_password' LIMIT 1");//query DB
     
     //query to find user in DB<?php
 include ('includes/Headsection.php');
 
	//user login	    
if (isset($_POST['spur_login']) && isset($_POST['spur_password']))
     {
      $spur_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["spur_login"]);//filter everything but numbers and letters
     $spur_password = strip_tags($_POST["spur_password"]);//strips off all tags
	$newpass= md5($spur_password);
	

     
     $sql= mysqli_query ($conn, "SELECT * FROM users WHERE username ='$spur_login' AND password ='$newpass' LIMIT 1");//query DB
     
     //query to find user in DB
     $usercount=mysqli_num_rows($sql);//count the number of rows returned
      if($usercount == 1){
       while($row= mysqli_fetch_array($sql))
       {
		$id=$row["id"];
  	     $user_status = $row["user_status"];
       }
        
      $_SESSION["spur_login"]=$spur_login;
      $_SESSION["user_id"]    = $id;
      $_SESSION["user_password"]    = $spur_password;
		$_SESSION["status"]    = 	$user_status ;
   
 echo "<script> window.location='index.php'; </script>";
 
      }
      
      else{
       echo "<script>alert ('That information is incorrect, check Username or Password! ' ); history.Back(); </script>";
       }
}
?>
	<section id="form" style="margin-top:0px;">

	<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="login.php" name="log" method="POST">
							<input type="text" name="spur_login" placeholder="Name" />
							<input type="password" name="spur_password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="login" class="btn btn-default">Login</button>
						</form>
					</div>
					
					<!--/login form-->
			
			</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
					<!--sign up form-->
						<h2>New User Signup!</h2>
						
		
						   <form  name="reg" method="POST" role="form" enctype="Multipart/form-data">
							<input type="text" name="fname" placeholder="First Name" required/>
							<input type="text" name="lname" placeholder="Last Name" required/>
							<input type="text" name="username1" placeholder="Username" required/>
							<input type="email" name="email" placeholder="Email Address" required/>
							<input type="number" name="mobile" placeholder="Phone/Mobile Number" required/>
							<input type="password" name="password" placeholder="Password" required>
							<input type="password" name="password2" placeholder="Confirm Password" required/>
							<div class="control-group">
								<select  onchange="print_state('state',this.selectedIndex);" id="country" name ="country"  required > </select> 
							</div><br>
							<div class="control-group">
								<select  name ="state" id ="state"  required></select>  
								<br>
							</div>
			
			  <br>
							<button type="submit" name="submit" class="btn btn-default" >Signup</button>
						</form>
						<script language="javascript">print_country("country");</script>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	<?php  include('includes/footer.php')?>
	
<?php		

if(isset($_POST['submit']) &&  isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username1']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])){

$spur_fname        = preg_replace('#[^A-Za-z]#i', '',$_POST['fname']);
$spur_lname        =preg_replace('#[^A-Za-z]#i', '',$_POST['lname']);
$spur_username   =preg_replace('#[^A-Za-z]#i', '',$_POST['username1']);
$spur_email         = strip_tags($_POST['email']);  
$mobile 			  = strip_tags($_POST['mobile']);  
$spur_password   = strip_tags($_POST['password']);
$spur_password2 = strip_tags($_POST['password2']);
$country			  =   $_POST['country'];
$state 				  =   $_POST['state'];
$profile_pic 				  =   'default_profile_pic.jpg';
$user_status 				  = 0;

$spur_check = mysqli_query($conn, "SELECT username FROM users WHERE email='$spur_email'");  
		
	 	$check = mysqli_num_rows($spur_check);
	 	    if($check == 0){
	  	       if( $spur_fname && $spur_lname && $spur_username && $spur_email && $spur_password && $spur_password2)
		   {	
			if($spur_password === $spur_password2)
			{		
	      if(strlen($spur_username) > 25){			  

		    echo "<script>alert('Username,  must not exceed 25 Characters!');
			history.Back();
			</script>";
	      }
	      else
		  {	      		   
	      if(strlen($spur_password) >30 || strlen($spur_password) < 5 ){
	    
		    echo "<script>alert('Your Password must be between 5 to 30 characters long!'); 	history.Back();</script>";
	       }	      
	else{
		// id, fname, lname, username, email, mobile, password, country, region, signup
	 $spur_password= md5($spur_password);
	 $query = "INSERT INTO users VALUES ('','$spur_fname', '$spur_lname','$spur_username','$spur_email', '$mobile', '$spur_password', '$country', '$state', '$profile_pic', '$user_status', now())";
	 if(mysqli_query($conn, $query)){
	
	   echo "<script>alert('Thank You for joining LJstores  , Login to your account!');</script>";
	 }
	}
		}
	       }
	       else{
	 
		echo "<script>alert('Your Passwords don't match!');</script>";
	       }
		    }
		    else{
	 
			 echo "<script>alert('Please fill all of the fields!');</script>";
		    }
		    }
		    else{
		
			  echo "<script>alert('Username / Email already Exists sorry ...');</script>";
		    }
		    }
		       ?>
	<?php

     $usercount=mysqli_num_rows($sql);//count the number of rows returned
      if($usercount == 1){
       while($row= mysqli_fetch_array($sql))
       {
	$id=$row["serial"];
       }
     
      
      $_SESSION["spur_login2"]=$spur_login2;
        echo "<script> window.location='index.php'</script>";
 
      exit();
      }
      else{
       echo "That information is incorrect, check Username or Password!";
       exit();
       }
}
 
		include('includes/footer.php');
	?>