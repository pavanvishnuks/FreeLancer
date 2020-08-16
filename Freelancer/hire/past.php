<?php
echo '<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">';
include "../connection.php";
		include "header.php";
		include "sublist.php";
		$name=$_SESSION["name"];

echo '<div class="boxx">
			<table class="tone">
			<tr class="trone">
			    <th class="thone"> PROJECT NAME </th>
			    <th class="thone"> OWNER </th>
			    <th class="thone"> LANCER NAME </th>
			    <th class="thone"> PROGRESS </th>
			</tr>';
			$query="select * from job where progress='finished' and hire_name='$name' ";
			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['hire_name'];
				$c = $row['work_name'];
				$d = $row['progress'];
		echo<<<abc
		<tr class="trone">
			    <td class="tdone">$a</td>
			    <td class="tdone">$b</td>
			    <td class="tdone">$c</td>
			    <td class="tdone">$d</td>
			    </tr>
abc;
		 	}
		 	echo'</table></div>';
	?>