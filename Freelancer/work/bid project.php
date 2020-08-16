
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
		echo'<div class="list"><table style="border:1px solid black; width:100%;">';		
			$wname =$_SESSION['name'];
			$project_name=$_GET['project_name'];
			$hname=$_GET['hire_name'];
			$query = "SELECT * from project where project_name='$project_name' and hire_name='$hname'";
		 $result = mysqli_query($mysqli, $query);	
		 while($row = $result->fetch_array(MYSQLI_ASSOC))
		 {
			 $a = $row['project_name'];
			 $b = $row['category'];
			 $c = $row['technologies'];
			 $d = $row['amount'];
			 $e = $row['hire_name'];
			 $f = $row['details'];

		echo<<<abc
		 <tr style="height:auto;"><td style="border:1px solid black; height:auto;">
		<p class="detailsfirst"> $b <br/></p>
		<p class="detailssecond"> $a </p><br/>
		<p class="details">$f</br>
		Skills Required: $c<br/>
		amount: $d<br/>
		Employee Name: $e<br/>
		</p>
		<form method="post" action="">
		<input class="bidamount" type="text" placeholder="Bid Amount" name="amount" required><br/><br/>
		<input type="submit" name="btn-submit" class="btn" vallue="Bid Project"></td></tr>	
		</form>
abc;
	}
		?>
</body>
</html>
<?php
		include "../connection.php";		
			$wname =$_SESSION['name'];
			$project_name=$_GET['project_name'];
			$hname=$_GET['hire_name'];
			if(isset($_POST['btn-submit']))
		{
			$amount=$_POST['amount'];
			if ($mysqli->query("INSERT into bidding(hire_name,work_name,bid_amount,project_name) values ('$hname','$wname','$amount','$project_name')") === TRUE)
			{
				echo "<script type='text/javascript'>
								window.location.href='search projects.php';
								</script>";
			}
			
			else
			{
			}
		}

?>