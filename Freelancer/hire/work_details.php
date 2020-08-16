<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">
</head>
<body>
	<?php
	include "../connection.php";
	$work_name=$_GET['work_name'];

	echo'<table class="tone">
			<tr class="trone">
			    <th class="thone"> PROJECT NAME </th>
			    <th class="thone"> EMPLOYEE NAME </th>
			    <th class="thone"> FEED BACK </th>
			</tr>';

			$query="select project_name,hire_name,hire_feedback from job where work_name='$work_name'";

			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['hire_name'];
				$c = $row['hire_feedback'];
				echo<<<abc
				<tr class="trone">
				    <td class="tdone">$a</td>
				    <td class="tdone">$b</td>
				    <td class="tdone">$c</td>
			    </tr>
abc;
			}
			echo'</table>';		 	 
?>
</body>
</html>