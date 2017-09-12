<?php 
 
include ('includes/Headsection.php');
?>
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">   
	     
			
			<div class="response-area">
			<?php 
							$sqlc =mysqli_query($connection, "SELECT * FROM contact WHERE msg_status ='0' ");
							  $count_msg = mysqli_num_rows($sqlc); ?>
						<h2><?php echo $count_msg; ?> New Messages</h2>
						<ul class="media-list">
						
						<?php 
							$sql=mysqli_query($connection, "SELECT * FROM contact   ORDER BY date DESC");
							 while($row = mysqli_fetch_array($sql)){
							$msg_id=$row['id'];
							$name=$row['name'];
							$email=$row['email'];
							$subject=$row['subject'];
							$msg_status=$row['msg_status'];
							$message=$row['message'];
							$date=$row['date'];
							
							 ?>
							<li class="media">
								
								 <?php if($msg_status==0){?>
									<h1 class="media-object fa fa-inbox pull-left" style="margin:50px; color:#4fbfa8;"></h1>
								 <?php }	else{ ?>
									 <h1 class="media-object fa fa-inbox pull-left" style="margin:50px; color:#ccc;"></h1>
							 <?php 	 } ?>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?php echo ucwords($name); ?></li>
										<li><i class="fa fa-envelope"></i><?php echo $email; ?></li>
										<li><i class="fa fa-calendar"></i><?php echo date('M jF, Y', strtotime($date)); ?></li>
										<li><i class="fa fa-clock-o"></i><?php echo date('H:i:s', strtotime($date)); ?></li>
									</ul>
									<h4><?php echo ucwords($subject); ?></h4>
									<p><?php echo ucwords($message); ?></p>
									<!--a class="btn btn-primary" href="<?php echo $email; ?>" style="margin:10px;"><i class="fa fa-reply"></i> Replay</a--> 
									 <?php if($msg_status==0){ ?> <a class="btn btn-primary mark_seen"   href="messages.php?mark_seen=<?php echo ucwords($msg_id); ?>"  style="margin:10px;"><i class="fa fa-eye"></i> Mark as Seen</a> <?php } ?>
									<a class="btn btn-primary pull-right del_msg" href="messages.php?del=<?php echo ucwords($msg_id); ?>" style="margin:10px; background:#960a0a;"><i class="fa fa-times"></i> Delete</a>&nbsp; &nbsp;
								</div>
							</li>
							 
							
							
							 <?php  } ?>
						</ul>					
					</div>
			<?php 
							if(isset($_GET['del'])){
							 $del_id =$_GET['del'];
								 
								
							 
									$query_del = mysqli_query($connection, "DELETE FROM contact WHERE id ='$del_id' ");
								if($query_del){
									 
											echo "<script>alert('Message Deleted Succefully');</script>";
									echo "<script>window.location='messages.php';</script>";
									exit();
							 
									 
								
								}
				 
								 
							}
							 
							?>	
							<?php 
							if(isset($_GET['mark_seen'])){
							 $mark_seen =$_GET['mark_seen'];
								 
								
							 
									$query_del = mysql_query("UPDATE  contact SET msg_status ='1' WHERE id ='$mark_seen' ");
								if($query_del){
									 
											 
									echo "<script>window.location='messages.php';</script>";
									exit();
							 
									 
								
								}
				 
								 
							}
							 
							?>
                
	<?php 
	include('includes/footer.php')
	?>
						