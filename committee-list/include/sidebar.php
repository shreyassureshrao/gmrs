<div class="span3">
					<div class="sidebar">

<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Manage Grievances
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="unprocessed-grievances.php">
											<i class="icon-tasks"></i>
											Unprocessed Grievances
											<?php
$rt = mysqli_query($bd,"SELECT * FROM tblcomplaints g,`committee-category-mapping` m, committee com where com.id='".$_SESSION['id']."' and 
m.committeeId=com.id and m.categoryId=g.category and g.status ='unprocessed'");
$num1 = mysqli_num_rows($rt);
{?>
		
											<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="underprocess-grievances.php">
											<i class="icon-tasks"></i>
											Under Processing Grievances
                   <?php 
                  
$rt = mysqli_query($bd,"SELECT * FROM tblcomplaints g,`committee-category-mapping` m, committee com where com.id='".$_SESSION['id']."' and 
m.committeeId=com.id and m.categoryId=g.category and g.status ='under processing'");
$num1 = mysqli_num_rows($rt);
{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="closed-grievances.php">
											<i class="icon-inbox"></i>
											Closed Grievances
	     <?php 
  
$rt = mysqli_query($bd,"SELECT * FROM tblcomplaints g,`committee-category-mapping` m, committee com where com.id='".$_SESSION['id']."' and 
m.committeeId=com.id and m.categoryId=g.category and g.status ='closed'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
							
							
						</ul>


						<ul class="widget widget-menu unstyled">
                                <li><a href="committee-member-list.php"><i class="menu-icon icon-tasks"></i> View Committee Members List </a></li>
								<li><a href="chart.php"><i class="menu-icon icon-paste"></i> Create Reports </a></li>
                                <li><a href="change-password.php"><i class="menu-icon icon-signout"></i> Change Password </a></li>
								<li><a href="logout.php"><i class="menu-icon icon-signout"></i> Logout </a></li>
                        
                            </ul><!--/.widget-nav-->

						</div><!--/.sidebar-->
				</div><!--/.span3-->
