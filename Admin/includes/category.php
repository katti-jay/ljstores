
	 
				<div class="col-md-3">
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						 
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens" class="collapsed">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Gents 
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
										<?php 
											$query = mysql_query("SELECT * FROM sub_categories WHERE cat_id_fk ='1' ");
 
											While($row =mysql_fetch_array($query)){
											$sub_id=$row['sub_id'];
											$cat_id_fk     =$row['cat_id_fk'];
											$sub_cat_name     =$row['sub_cat_name'];
										?>
											<li style="padding:5px;"><a href="viewcat.php?view=<?php echo $cat_id_fk;?>&sub_cat=<?php echo $sub_id;?>"><?php echo $sub_cat_name; ?></a></li>
										<?php } ?>
											 
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens" class="collapsed">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Ladies
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<ul>
										<?php 
											$query = mysql_query("SELECT * FROM sub_categories WHERE cat_id_fk ='2' ");
 
											While($row =mysql_fetch_array($query)){
											$sub_id=$row['sub_id'];
											$cat_id_fk     =$row['cat_id_fk'];
											$sub_cat_name     =$row['sub_cat_name'];
										?>
											<li style="padding:5px;"><a href="viewcat.php?view=<?php echo $cat_id_fk;?>&sub_cat=<?php echo $sub_id;?>"><?php echo $sub_cat_name; ?></a></li>
										<?php } ?>
											 
										</ul>
											 
										</ul>
									</div>
								</div>
							</div>
							</div>
							</div>
					 