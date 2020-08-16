<?php
		include "connection.php";
		
		if(isset($_POST['btn-signin']))
		{
			$emailid=$_POST['emailid'];
			$password=$_POST['password'];
			$name=$_POST['name'];
			$phone=$_POST['phone'];

			$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from work w, hire h where h.email_id='$emailid' or w.email_id='$emailid'")));
					if($one>='1')
					{
						echo "<script>
						window.alert('emailid Already exists');
						</script>";
					}
					else
					{
						$one = implode(mysqli_fetch_assoc(mysqli_query($mysqli,"select count(*) from work w, hire h where h.name='$name' or w.name='$name'")));
						if($one>='1')
					{
						echo "<script>
						window.alert('name Already exists');
						</script>";
					}
					else
					{
						echo "<script>
						window.location.href='signup2.php?emailid=$emailid&password=$password&name=$name&phone=$phone';
						</script>";
					}
				}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title> FREELANCER - Sign Up </title>
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
		<p style="text-align: center; font-family: 'lato'; font-size: 18px; font-weight: bold;"> Sign Up </p>
		<div class="textbox">
			<input type="text" placeholder="Email Address" name="emailid" required>
		</div>

		<div class="textbox">
			<input type="password" placeholder="Password" name="password" required>
		</div>

		<div class="textbox">
			<input type="text" placeholder="Name" name="name" required>
		</div>

		<div class="textbox">
			<input type="text" placeholder="Phone Number" name="phone" required>
		</div>

		<input class="btn" type="submit" name="btn-signin" value="Join Freelancer">
		<br><br><hr>
		<br>
		<p style="text-align: center;">Already have an account? <a href="login.php"> Log In </a></p>
	</form>
	</div>
</body>
</html>