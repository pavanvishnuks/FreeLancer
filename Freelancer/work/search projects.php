<!DOCTYPE html>
<html>
<head>
	<title>search Project by category</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">
</head>
<body>
	<?php
		include"header.php";
		include "../connection.php";
		$wname=$_SESSION["name"];
		echo'<div class="list"><table style="border:1px solid black; width:100%;">';
		$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from project")));
	if($one>'0')
	{   
	     $query = "SELECT * from project";
		 $result = mysqli_query($mysqli, $query);	
		 while($row = $result->fetch_array(MYSQLI_ASSOC))
		 {
			 $a = $row['project_name'];
			 $b = $row['category'];
			 $c = $row['technologies'];
			 $d = $row['amount'];
			 $e = $row['hire_name'];
			 $f = $row['details'];
			$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from bidding where project_name='$a' and hire_name='$e' and work_name='$wname'")));
			if($one=='0')
					{
			echo<<<abc
		 <tr style="height:auto;"><td style="border:1px solid black; height:auto;  padding:10px 0px 40px 40px;">
		<p class="detailsfirst"> $b <br/></p>
		<p class="detailssecond"> $a </p><br/>
		<p class="details">$f</br>
		Skills Required: $c<br/>
		amount: $d<br/>
		Employee Name: $e<br/>
		</p>
		<div class="buttonbox"><a class="btnone" href="bid project.php?hire_name=$e&project_name=$a" value="Bid">Bid Project</a></div></td></tr>	
abc;
		}
		 }
	}
	?>
	</div>
</body>
</html>