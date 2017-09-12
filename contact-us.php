<?php 
 
include ('includes/Headsection.php');
?>
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">   	
						<?php 
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$msg_status=0;
		$message=$_POST['message'];
		
		$sql=mysqli_query($conn, "INSERT INTO contact VALUES('', '$name','$email','$subject', '$message','$msg_status', now())");
	 
		if($sql){
			?> 
			        <div class="col-sm-9 padding-right"> 
                            <div class="charts_container">
                                <div class="chart_container">
                                     <div class="alert alert-info">We will get back to you soon. Thank You for Using LJstores</div>  
                                    <canvas id="chartCanvas1" width="1100" height="400">
                                        Your web-browser does not support the HTML 5 canvas element.
                                    </canvas>

                                </div>
                            </div>
        </div>
                
                 
<?php	}else{ ?>
	
	 <div class="col-sm-9 padding-right"> 
                            <div class="charts_container">
                                <div class="chart_container">
                                     <div class="alert alert-info">Sorry Something went wrong</div>  
                                    <canvas id="chartCanvas1" width="1100" height="400">
                                        Your web-browser does not support the HTML 5  element.
                                    </canvas>

                                </div>
                            </div>
        </div>
<?php }
	
	}
	?> 		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
				
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
					
	
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" action="" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-7">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Information</h2>
	    				<address>
	    					<p>LJ-stores ltd.</p>
							<p>No 2 Naomi Jugu close, opp govt house Rayfield.</p>
							<p>Jos, Nigeria</p>
							<p>Mobile GHANA: +233 24 5237 219 </p>
                            <p>Mobile NIGERIA: +234 8037 725 692 </p>
							<p>Email: info@ljstores.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul class="nav navbar-nav">
								<li>
                                    <a href="https://web.facebook.com/"><i class="fa fa-facebook"></i></a>
                                </li>
								<li>
                                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                                </li>
								<li>
                                    <a href="https://www.linkedin.com/feed/"><i class="fa fa-linkedin"></i></a>
                                </li>
								
								<li>
                                    <a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/kattijay/"><i class="fa fa-pinterest"></i></a>
                                </li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
<?php 
	include('includes/footer.php')
	?>
	