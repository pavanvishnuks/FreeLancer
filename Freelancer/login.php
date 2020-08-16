<?php
		include "connection.php";
		
		if(isset($_POST['btn-login']))
		{
			$id=$_POST['userid'];
			$password=$_POST['password'];
			session_start();

			$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from work where email_id='$id' and password='$password'")));
					if($one=='1')
					{
						$query = "select name from work where email_id='$id'";
						$result = mysqli_query($mysqli, $query);
						$row = mysqli_fetch_array($result);
						$b = $row['name'];
						$_SESSION["name"]=$b;
						echo "<script>
						window.alert('WELCOME $b');
						window.location.href='work/index.php';
						</script>";
					}
					else
					{
						$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from hire where email_id='$id' and password='$password'")));
						if($one=='1')
						{ 
							$query = "select name from hire where email_id='$id'";
							$result = mysqli_query($mysqli, $query);
							$row = mysqli_fetch_array($result);
							$b = $row['name'];
							$_SESSION["name"]=$b;
							echo "<script>
							window.alert('WELCOME $b');
							window.location.href='hire/index.php';
							</script>";
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert("Invalid Username or Password")';
							echo '</script>';
						}
					}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title> FREELANCER - Log In </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
</head>
<body>
	<?php
		error_reporting(0);
  		include "header.html";
	?>
	<div class="login-box">
		<form action="" method="post">
			<img src="logo.png" alt="logo" style="position:relative; left: 35px; margin-top:-10px; height:10vh; width:200px;">
			<p style="text-align: center; font-family: 'lato'; font-size: 18px; font-weight: bold;"> Welcome Back </p>
			<div class="textbox">
				<input type="text" placeholder="Email ID" name="userid" required>
			</div>

			<div class="textbox">
				<input type="password" placeholder="Password" name="password" required>
			</div>

			<input class="btn" type="submit" name="btn-login" value="Log In">
			<br><br><hr>
			<br>
			<p style="text-align: center;">Don't have an account? <a href="signup.php" style=""> Sign Up </a></p>
		</form>
	</div>
</body>
</html>