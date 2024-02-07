<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand">
			  	<?php $query=mysqli_query($bd,"select fullName from users where userEmail='".$_SESSION['login']."'");
				while($row=mysqli_fetch_array($query)) 
				{
				?> 
              	  <img src="http://localhost/gmrs/img/grievance.jpg" width="150" height="150" /> Grievance Monitoring and Redressal System | Welcome, <?php echo htmlentities($row['fullName']);?>
                  <?php } ?>
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="http://localhost/gmrs/">
						Back to Portal
						
						</a></li>
			
					</ul>
				</div><!-- /.nav-collapse -->
				
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
