<?php
		include "../connection.php";
		$name =$_GET['name'];
		$project_name=$_GET['project_name'];
		if(isset($_POST['btn-feedback']))
		{
			$feedback =$_POST['feedback'];
			if ($mysqli->query("UPDATE job set progress='finished',hire_feedback='$feedback' where project_name='$project_name' and hire_name='$name'") === TRUE)
			{
				header("location:current.php");
			}
			else
			{
				echo "$name";
				echo " something wrong to delete";
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title> feedback </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../style2.css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
</head>
<body>
	<?php
		error_reporting(0);
  		include "header.html";
	?>
	<div class="login-box">
		<form action="" method="post">
			<img src="../logo.png" alt="logo" style="position:relative; left: 35px; margin-top:-10px; height:10vh; width:200px;">
			<p style="text-align: center; font-family: 'lato'; font-size: 18px; font-weight: bold;">  </p>
			<textarea rows="5" cols="50" placeholder="Feed back" name="feedback"></textarea>

			<input class="btn" type="submit" name="btn-feedback" value="POST">
			<br><br><hr>
			<br>
			<p style="text-align: center;">want to Skip this Process? --> <a href="past.php"> Sign Up </a></p>
		</form>
	</div>
</body>
</html>