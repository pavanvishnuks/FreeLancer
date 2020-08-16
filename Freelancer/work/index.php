<!DOCTYPE html>
<html>
<head>
	<title>FREELANCER-Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">
</head>
<body>
	<?php
		include"header.php";
	?>
	<div class="bgimage">
		<div class="board">
			<div class="blur">
				<p><br/><br/>Total Projects<br/>
					<?php
							include "../connection.php";
							$wname=$_SESSION["name"];
							$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from job where work_name='$wname'")));
							echo "".$one;
					?>
				</p>
			</div>
		</div>
		<div class="board">
			<div class="blur">
				<p><br/><br/>Active Bids<br/>
					<?php
							include "../connection.php";
							$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from bidding where work_name='$wname'")));
							echo "".$one;
					?>
				</p>
			</div>
		</div>
		<div class="board">
			<div class="blur">
				<p><br/><br/>Currently Working<br/>
					<?php
							include "../connection.php";
							$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from job where work_name='$wname' and progress='working'")));
							echo "".$one;
					?>
				</p>
			</div>
		</div>
		<div class="board">
			<div class="blur">
				<p><br/><br/>Finished Project<br/>
					<?php
							include "../connection.php";
							$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from job where work_name='$wname' and progress='finished'")));
							echo "".$one;
					?>
				</p>
			</div>
		</div>
	</div>
</body>
</html>