<?php
echo '<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">';
include "../connection.php";
		include "header.php";
		include "sublist.php";
		$name=$_SESSION["name"];
echo'<div class="boxx"><br><br><br><br><br><br><table class="tone">
			<tr class="trone">
			    <th class="thone"> PROJECT NAME </th>
			    <th class="thone"> PROJECT CATEGORY </th>
			    <th class="thone"> TECHNOLOGIES </th>
			    <th class="thone"> AMOUNT </th>
			    <th class="thone"> OPTION </th>
			</tr>';
			$query="select * from project where hire_name='$name' ";
			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['category'];
				$c = $row['technologies'];
				$d = $row['amount'];
		echo<<<abc
		<tr class="trone">
			    <td class="tdone">$a</td>
			    <td class="tdone">$b</td>
			    <td class="tdone">$c</td>
			    <td class="tdone">$d</td>
			    <td class="tdone"><a class="butthree" href="Delete Job.php?name=$name&project_name=$a">Delete Job</a></td>
		 	 </tr>
abc;
		 	}
		 	echo'</table>';

		 	echo'<br><br><br><table class="tone">
			<tr class="trone">
			    <th class="thone"> PROJECT NAME </th>
			    <th class="thone"> LANCER NAME </th>
			    <th class="thone"> AMOUNT </th>
			    <th class="thone"> BID AMOUNT </th>
			    <th class="thone"> PROGRESS </th>
			    <th class="thone"> ACTION </th>
			</tr>';
			$query="select * from job where hire_name='$name'and progress='working' ";
			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['work_name'];
				$c = $row['bid_amount'];
				$d = $row['amount'];
		echo<<<abc
		<tr class="trone">
			    <td class="tdone">$a</td>
			    <td class="tdone">$b</td>
			    <td class="tdone">$d</td>
			    <td class="tdone">$c</td>
			    <td class="tdone">Working</td>
			    <td class="tdone"><a class="butthree" href="feedback.php?name=$name&project_name=$a">Finish</a></td>
		 	 </tr>
abc;
		 	}
		 	echo'</table></div>';
		?>