	<div class="menu">
		<div class="leftmenu">
			<a href="index.php"><img src="../logo.png" alt="logo" style="float:right; margin-top:-10px; height:10vh; width:200px;"></a>
			<!--<h4> FREELANCER </h4>-->
		</div>
		<div class="rightmenu">
			<ul>
				<li><a class="options" href="index.php"> DASHBOARD </a></li>
				<li><a class="options" href="bids.php"> my projects </a></li>
				<li><a class="options" href="signout.php"> Log out </a></li>
				<li><a class="options" href="../post-project.php" target="_blank"> POST PROJECT </a></li>
				<?php
				session_start();
			if(!(isset($_SESSION["name"])) )
				header("Location:../login.php");	
				$name=$_SESSION["name"];
				?>
				<li id="lastlist"><a class="options" > <?php echo"".$name; ?> </a></li>
				<!--<li id="lastlist"><a class="postajob" href="post-project.php" target="_blank"> post a project </a></li>
				<li> CONTACT </li>-->
			</ul>
		
	</div>