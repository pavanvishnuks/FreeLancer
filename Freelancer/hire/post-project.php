<?php
				session_start();
			if(!(isset($_SESSION["name"])) )
				header("Location:../login.php");	
				$name=$_SESSION["name"];
				?>

<?php
		include "../connection.php";
		if(isset($_POST['btn-post']))
{		
		$pname = $_POST['pname'];
		$category = $_POST['category'];
		$technologies = $_POST['technologies'];
		$budget = $_POST['budget'];
		$description = $_POST['description'];

			if ($mysqli->query("INSERT into project(project_name,category,	technologies,amount,hire_name,	details) values ('$pname','$category','$technologies','$budget','$name','$description')") === TRUE) 
			{
				echo "<script>
						window.alert('Project Posted');
						window.location.href='hire/index.php';
						</script>";
			}
			else
			{
				echo "<script>
						window.alert('Some Error Please try After sometime.');
						</script>";
			}
			
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> FREELANCER - Post Project </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section class="wave"></section>
		<div class="wavediv">
				<img src="logo.png" alt="logo" style="float:left; position: absolute; top: 1px; height:10vh; width:200px;">
				<h3>Tell us what you need done</h3>
				<p>Contact skilled freelancers within minutes. Pay the freelancer only when you are 100% satisfied with their work.</p><br>
				<hr><br>
				<div class="div1">
				<form action="" method="post">
					<h4> Choose a name for your project </h4>
					<input type="text" placeholder="e.g. Build me a website" minlength="10" name="pname" required>
					<br><br><br><br>
					<h4> Project Category </h4>
					<select name="category">
						<option value="Website Design"> Website Design</option>
						<option value="Data Entry"> Data Entry</option>
						<option value="Article Writing"> Article Writing</option>
						<option value="App Development"> App Development</option>
						<option value="Logo Design"> Logo Design</option>
						<option value="Software Development"> Software Development</option>
						<option value="Database"> Database</option>
						<option value="Photo Editing"> Photo Editing</option>
						<option value="Business Card Design"> Business Card Design</option>
					</select><br><br><br/>
					<h4> Tell us more about your project </h4>
					<p> start with a bit about yourself on your business, and include an overview of what you need done. </p>
					<textarea rows="5" cols="50" placeholder="e.g. Build me a website" name="description"></textarea>
					<h4> What skills are required?</h4>
					<input type="text" placeholder="e.g. PHP HTML" name="technologies" required>
					<p> provide space between technologies </p>
					<br>
					<h4>What is your estimated Budget?</h4>
					<select>
						<option value=""> Micro Project(Rs.600 - 1500 INR)</option>
						<option value=""> Simple Project(Rs.1500 - 12500 INR)</option>
						<option value=""> Small Project(Rs.12500 -37500 INR)</option>
						<option value=""> Medium Project(Rs.37500 - 75000 INR)</option>
						<option value=""> Large Project(Rs.75000 - 150000 INR)</option>
					</select><br/>
					<input type="text" placeholder="Enter the Amount" name="budget" required>
					<input type="submit" value="Post Project" style="background-color: orange; width: 160px; cursor: pointer; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); position: absolute; right: 40px; bottom: 20px;" name="btn-post">
				</form>
				</div>
		</div>
		
</body>
</html>