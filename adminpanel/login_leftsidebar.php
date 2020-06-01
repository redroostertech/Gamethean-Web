<ul class="login_leftsidebar"> 

	<?php 

		?>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "users" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=users">All Users</a></li>

			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "reviewPictures" ) {
				echo 'class="active"';
			} } ?>><a href="dashboard.php?p=reviewPictures">Under Review Images</a></li>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "reported_users" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=reported_users">Reported Users</a></li>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "notifications" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=notifications">Send Notifications</a></li>
			
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "change_password" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=change_password">Chanage Password</a></li>

			<li <?php if(isset($_GET['log'])) { if( $_GET['log'] == "out" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?log=out">Logout</a></li>

			

	
		<?php

		?>

</ul>