<?php
		include "connection.php";
		
		if(isset($_POST['btn-signin2']))
		{
			$email_id=$_GET['emailid'];
			$password=$_GET['password'];
			$name=$_GET['name'];
			$phone_number=$_GET['phone'];
			$technologies=$_POST['technologies'];

			if ($mysqli->query("INSERT into work(email_id,password,name,skills,phone_number) values ('$email_id','$password','$name','$technologies','$phone_number')") === TRUE) 
			{
						session_start();
						$_SESSION["name"]=$name;
						echo "<script>
						window.alert('WELCOME $name');
							window.location.href='work/index.php';
						</script>";
					}
					else
					{
						echo "<script>
						window.alert('Try Later');
						</script>";
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
		<br/><center>You're Join to join Freelancer as?</center>
			<select name="type">
						<option value="hire"> Hire </option>
						<option value="work"> Work </option>
			</select>

		<input class="btn" type="submit" name="btn-signin" value="Continue">
		<br><br><hr>
		<br>
		<p style="text-align: center;">Already have an account? <a href="login.php"> Log In </a></p>
	
	<?php
		if(isset($_POST['btn-signin']))
		{
			$type=$_POST['type'];

			if($type=='hire')
			{
				$email_id=$_GET['emailid'];
				$password=$_GET['password'];
				$name=$_GET['name'];
				$phone_number=$_GET['phone'];
				session_start();
				$a=$_GET['name'];
				$_SESSION["name"]=$a;
				if ($mysqli->query("INSERT into hire(email_id,password,name,phone_number) values ('$email_id','$password','$name','$phone_number')") === TRUE) 
				{
					echo "<script>
						window.alert('WELCOME $a');
							window.location.href='hire/index.php';
						</script>";
				}
			}
			else
			{
				if($type=='work')
				{
					echo'
					<form action="" method="post">
					<div class="textbox">
						<input type="text" placeholder="Skills" name="technologies" required>
					</div>
					provide space between Skills
					<input class="btn" type="submit" name="btn-signin2" value="Join">
					</form>';
				}
			}
		}	
	?>
	</div>
	</form>
</body>
</html>